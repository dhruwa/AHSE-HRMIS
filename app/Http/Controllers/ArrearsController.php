<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Validator, Redirect, Auth, Crypt;
use ParameterValue;

class ArrearsController extends Controller
{
    public function calculate(Request $request) {
    	$current_date = date('Y-m-d');
        $where = [];

        $month 	= date('F', strtotime($current_date));
        $year 	= date('Y', strtotime($current_date));

        $employees = DB::table('employees')->select('emp_id', 'emp_f_name', 'emp_m_name', 'emp_l_name')->paginate(300);

        $revised_da_info = DB::table('parameter_values')->where('parameter_id',1)->where('status',1)->select('value','effective_from', 'effective_to')->first();

        $revised_da_value = $revised_da_info->value;
        $revised_da_from  = $revised_da_info->effective_from;
        $revised_da_to    = $revised_da_info->effective_to;

        $revised_month 	= date('F', strtotime($revised_da_from));
        $revised_year 	= date('Y', strtotime($revised_da_from));

        foreach($employees as $k => $v) {
        	$employees[$k]->new_da = '';
        	$employees[$k]->arrear = '';
        	$employees[$k]->total_da = '';

        	//calculate salary received
        	$salary_claimed = DB::table('salary_claims')
        						->where('salary_claims.emp_id', $v->emp_id)

        						->where('salary_claims.month', '>=', $revised_month)
        						->where('salary_claims.year',  '>=', $revised_year)

        						//->where('salary_claims.month', '<=', $month)
        						->where('salary_claims.year',  '<=', $year)

        						->select(
        								'salary_claims.dearness_allowance', 
        								'salary_claims.basic_pay',
        								'salary_claims.gross_salary'
        								)
        						->get();
        	$total_da = 0;
        	$new_da   = 0;
        	$arrear   = 0;	
        	$n_da     = 0;				
        	foreach($salary_claimed as $k1 => $v1) {

        		$total_da += $v1->dearness_allowance;
        		$n_da     = 0;	
        		$n_da = ($v1->basic_pay)*($revised_da_value/100);
        		$new_da += $n_da;

        		$arrear += $new_da - $total_da;

        		$employees[$k]->total_da = $new_da;
        		$employees[$k]->new_da   = $total_da;
        		$employees[$k]->arrear   = $arrear;
        	}
        }
        return view('admin.employees.calculate_arrear', compact('employees', 'current_date'));
    }

    public function arrearExcelDownload() {
        \Excel::create('Arrear', function( $excel) {
          $excel->sheet('Arrear-data', function($sheet) {
            $sheet->setTitle('AHSEC Arrear Data');
            $sheet->protect('12345');
            $sheet->cells('A1:B1:C1', function($cells) {
	            $cells->setFontWeight('bold');
	        });

            $employees = DB::table('employees')->select('emp_id', 'emp_f_name', 'emp_m_name', 'emp_l_name')->get();


            $revised_da_info = DB::table('parameter_values')->where('parameter_id',1)->select('value','effective_from', 'effective_to')->first();

	        $revised_da_value = $revised_da_info->value;
	        $revised_da_from  = $revised_da_info->effective_from;
	        $revised_da_to    = $revised_da_info->effective_to;

	        $revised_month 	= date('F', strtotime($revised_da_from));
	        $revised_year 	= date('Y', strtotime($revised_da_from));

            $carray = array();

	        foreach($employees as $k => $v) {
	        	$employees[$k]->new_da = '';
	        	$employees[$k]->arrear = '';
	        	$employees[$k]->total_da = '';


	        	$carray[$k]['Employee ID']     = $v->emp_id;
	        	$carray[$k]['Employee Name']   = $v->emp_f_name.' '.$v->emp_m_name.' '.$v->emp_l_name;

	        	//calculate salary received

	        	$current_date = date('Y-m-d');
		    	$month 	= date('F', strtotime($current_date));
		        $year 	= date('Y', strtotime($current_date));

	        	$salary_claimed = DB::table('salary_claims')
	        						->where('salary_claims.emp_id', $v->emp_id)
	        						
	        						->where('salary_claims.month', '>=', $month)
	        						->where('salary_claims.year',  '>=', $year)

	        						->where('salary_claims.month', '>=', $revised_month)
        							->where('salary_claims.year',  '>=', $revised_year)

	        						->select(
	        								'salary_claims.dearness_allowance', 
	        								'salary_claims.basic_pay',
	        								'salary_claims.gross_salary'
	        								)
	        						->get();
	        	$total_da = 0;
	        	$new_da   = 0;
	        	$arrear   = 0;	
	        	$n_da     = 0;				
	        	foreach($salary_claimed as $k1 => $v1) {
	        		$total_da += $v1->dearness_allowance;
	        		$n_da     = 0;	
	        		$n_da = ($v1->basic_pay)*($revised_da_value/100);
	        		$new_da += $n_da;

	        		$arrear += $new_da - $total_da;

	        		$employees[$k]->total_da = $new_da;
	        		$employees[$k]->new_da   = $total_da;
	        		$employees[$k]->arrear   = $arrear;

	        		$carray[$k]['Arrear']    = $arrear;
	        	}
	        }
	        $sheet->fromArray($carray, null, 'A1', false, true);
           });
        })->download('xlsx');
    }


}
