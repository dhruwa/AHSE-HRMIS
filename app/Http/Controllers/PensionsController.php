<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Validator, Redirect, Auth, Crypt;
use App\Http\Helpers;
use App\salary_claims, App\servicebook, App\EmployeePensionDetail,App\Pension;
use DateTime;
use DateInterval;

class PensionsController extends Controller
{

    //list all employees whose date of retirement is crossed
    public function addPensionDetails(Request $request) {
        $where = [];
        $employees = $this->getRetiredEmployees($where);
        return view('admin.pensions.add_pension_details', compact('employees'));
    }

    public function addBankAddressDetails( $employee_id = NULL) {
        $employee_id = Crypt::decrypt($employee_id);
        $employee = DB::table('employees')
            ->where('employees.emp_id', $employee_id)
            ->select('employees.emp_id as employeeId', 'employees.emp_f_name as emp_f_name', 'employees.emp_m_name as emp_m_name', 'employees.emp_l_name as emp_l_name', 'employees.emp_dob as dob', 'employees.emp_gender as gender', 'employees.emp_present_house_no as emp_present_house_no', 'employees.emp_present_locality as emp_present_locality', 'employees.emp_contact_no as contactNumber', 'employees.emp_contact_no as contactNumber', 'employees.emp_alt_contact_no as altContactNumber','employees.emp_present_city as emp_present_city', 'employees.emp_present_district as emp_present_district', 'employees.bank_account_number as bank_account_details')
            ->first();
        $bank_account_details   = $employee->bank_account_details;
        $address                = 'HN- '.$employee->emp_present_house_no.', '.$employee->emp_present_locality.','.'City - '.$employee->emp_present_city.', '.'District -'.$employee->emp_present_district;
        return view('admin.pensions.add_bank_details', compact('employee', 'bank_account_details', 'address'));
    }

    public function postPensionDetails(Request $request, $employee_id) {
        $data = $request->all();
        $data['emp_id'] = Crypt::decrypt($employee_id);
        $validator = Validator::make($data, EmployeePensionDetail::$rules);
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

        $message = '';
        if(EmployeePensionDetail::create($data)) {
            $message .= 'Details Added Successfully !';
        }else{
            $message .= 'Unable to Add Details !';
        }

        return Redirect::route('pension.employees.pension_details.view')->with('message', $message);
    }


    public function viewPensionDetails() {
        $employees = DB::table('employee_pension_details')
            ->join('employees', 'employees.emp_id', '=', 'employee_pension_details.emp_id')
            ->select('employees.emp_id as employeeId', 'employees.emp_f_name as emp_f_name', 'employees.emp_m_name as emp_m_name', 'employees.emp_l_name as emp_l_name', 'employees.emp_dob as dob', 'employee_pension_details.bank_details as bank_details', 'employee_pension_details.current_address as current_address')
            ->paginate(50);
        return view('admin.pensions.view_pension_details', compact('employees'));
    }
	//list all aemployees whose date of retirement is crossed
	public function viewEmployees() {
		$current_date = date('Y-m-d');
		$where = [];
		$employees = $this->getRetiredEmployees($where);

        $da = 107;
        $medical = 750;
        return view('admin.pensions.view_employees', compact('employees', 'da', 'medical'));
	}

    public function settle( Request $request) {
        $org_data   = $request->all();
        $mothyear   = $request->mothyear;
        $mothyear   = explode('-', $mothyear);

        $month      = $mothyear[1];
        $year       = $mothyear[0];

        $da         = $request->da;
        $medical    = $request->medical;
        if($request->basic) {
            for( $i = 0; $i < count( $request->basic ); $i++ ) {
                $data['month']  = $month;
                $data['year']   = $year;
                $data['dr']     = $da;
                $data['medical']   = $medical;

                $data['employee_id'] = $request->employee_id[$i];
                $data['pension']   = $request->pension_amount[$i];

                $data['pension_order_number'] = $request->pension_order_number[$i];
                $data['pension_order_date'] = date('Y-m-d', strtotime($request->pension_order_date[$i]));

                $data['pension_type'] = $request->pension_type[$i];
                $data['basic'] = $request->basic[$i];
                $data['total_pension'] = $request->total_pension[$i];
                $validator = Validator::make($data, Pension::$rules);
                if (!$validator->fails()) {
                    Pension::create($data);
                }else{
                    dump($validator);
                }
            }
        }
        return Redirect::route('employees.pension_data', [$month,$year]);
    }
	
	public function prepareRTGS() {
        return view('admin.pensions.prepare_rtgs');
    }

    public function generateRTGS(Request $request) {
        $monthyear = $request->mothyear;
        $monthyear = explode('-', $monthyear) ;
        $year      = $monthyear[0];
        $month     = $monthyear[1];

        $results = Pension::where(['month' => $month, 'year' => $year])->get();
        foreach( $results as $k => $v) {
            $pension = Pension::findOrFail($v->id);
            $pension->rtgs_generated = 'yes';
            $pension->save();
        }

        $employees = DB::table('pensions')
            ->where('pensions.month', $month)
            ->where('pensions.year', $year)
            ->where('pensions.rtgs_generated', 'yes')
            ->join('employee_pension_details', 'employee_pension_details.emp_id', 'pensions.employee_id')
            ->join('employees', 'employees.emp_id', 'pensions.employee_id')
            ->select(
                'pensions.total_pension as total_pension',
                'employee_pension_details.bank_details as bank_details', 
                'employees.emp_f_name as emp_f_name','employees.emp_m_name as emp_m_name',
                'employees.emp_l_name as emp_l_name','employees.emp_id as emp_id'
                )
            ->get();
        return view('admin.pensions.generate_rtgs', compact('employees', 'year', 'month'));
    }

    public function viewPensionData($month = null, $year = null ) {
        $employees = DB::table('pensions')
            ->where('pensions.month', $month)
            ->where('pensions.year', $year)
            ->join('employee_pension_details', 'employee_pension_details.emp_id', 'pensions.employee_id')
            ->join('employees', 'employees.emp_id', 'pensions.employee_id')
            ->select(
                'pensions.pension_order_number as pension_order_number',
                'pensions.pension_order_date as pension_order_date',
                'pensions.pension_type as pension_type',
                'pensions.dr as dr',
                'pensions.medical as medical',
                'pensions.basic as basic',
                'pensions.total_pension as total_pension',
                'employee_pension_details.bank_details as bank_details', 
                'employees.emp_f_name as emp_f_name','employees.emp_m_name as emp_m_name',
                'employees.emp_l_name as emp_l_name','employees.emp_dob as dob',
                'employees.emp_date_of_joining as date_of_joining', 
                'employees.emp_date_of_retirement as emp_date_of_retirement' 
                )
            ->get();
            return view('admin.pensions.view_pension_data', compact('employees'));
    }

    private function getRetiredEmployees($where = array(), $paginate = 50) {
        $current_date = date('Y-m-d');
        
        $employees = DB::table('employees')
            ->where($where)
            ->join('posts', 'posts.fld_PostID', 'employees.post_id')
            ->join('departments', 'departments.fld_DeptID', 'employees.fld_DeptID')
            ->select('employees.emp_id as employeeId', 'employees.emp_f_name as emp_f_name', 'employees.emp_m_name as emp_m_name', 'employees.emp_l_name as emp_l_name', 'employees.emp_dob as dob', 'employees.emp_gender as gender', 'employees.emp_date_of_joining as dateOfJoining', 'employees.emp_date_of_retirement as emp_date_of_retirement', 'employees.emp_gender as gender', 'employees.emp_contact_no as contactNumber', 'employees.emp_contact_no as contactNumber', 'employees.emp_alt_contact_no as altContactNumber', 'departments.fld_Department as departmentName', 'posts.fld_PostName as postName')
            ->paginate($paginate); //dd($employees);
        foreach($employees as $k => $v) {
            $employees[$k]->date_of_retirement = '';
			if($v->emp_date_of_retirement != null && $v->emp_date_of_retirement != ''){
				$retirement_date =  $v->emp_date_of_retirement;
				if(date('Y-m-d') < $retirement_date) {
				   unset($employees[$k]); 
				}else{
				   $employees[$k]->date_of_retirement = $retirement_date;
				}
			}else{
				unset($employees[$k]); 
			}
        }

        return $employees;
    }
	
	public function viewSettledPensionData(Request $request) {
        $where['pensions.pension_status'] = 'active';
        //$where['pensions.rtgs_generated'] = 'active';
        $results = DB::table('pensions')
            ->where($where)
            ->join('employees', 'employees.emp_id', 'pensions.employee_id')
            ->orderBy('pensions.year')
            ->orderBy('pensions.month')
            ->select(
                    'pensions.id as pension_id',
                    'pensions.pension_order_number as pension_order_number',
                    'pensions.pension_order_date as pension_order_date',
                    'pensions.pension_type as pension_type',
                    'pensions.month as month',
                    'pensions.year as year',
                    'pensions.dr as dr',
                    'pensions.medical as medical',
                    'pensions.pension as pension',
                    'pensions.basic as basic',
                    'pensions.total_pension as total_pension',
                    'pensions.rtgs_generated as rtgs_generated',
                    'employees.emp_id as employeeId', 
                    'employees.emp_f_name as emp_f_name', 
                    'employees.emp_m_name as emp_m_name', 
                    'employees.emp_l_name as emp_l_name'
                )
            ->paginate(30);

        return view('admin.pensions.view_settled_pension_data', compact('results'));
    }

    public function editPensionData($id) {
        $pension = Pension::findOrFail(Crypt::decrypt($id));
        $pension['pension_order_date'] = date('d-m-Y', strtotime($pension->pension_order_date));
        return view('admin.pensions.edit_pension_data', compact('pension', 'id'));
    }
	
	public function updatePensionData(Request $request, $id) {
        $data = $request->all();
        $data['pension_order_date'] = date('Y-m-d', strtotime($request->pension_order_date));
        $validator = Validator::make($data, Pension::$update_rules); 
        if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();
        $pension = Pension::findOrFail(Crypt::decrypt($id));
        $message = '';
        $alert_class = 'alert-success';

        if($pension->rtgs_generated == 'no') {
            $pension->fill($data);
            if($pension->save()) {
                $message .= 'Pension Data Updated Successfully !';
            }else{
                $alert_class = 'alert-danger';
                $message .= 'Unable to update  Pension Data !';
            }    
        }else{
            $alert_class = 'alert-danger';
            $message .= ' RTGS already generated !';
        }
        
        return Redirect::route('employees.settled.pension_data')->with(['message' => $message, 'alert-class' => $alert_class]);
    }
}
