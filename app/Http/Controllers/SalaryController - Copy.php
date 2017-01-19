<?php

namespace App\Http\Controllers;
use Request;
use App\salary_claims;
use App\employee;
use App\salary_deduction;
use DB;
use Input;
class SalaryController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	
    public function salary_claim(){
		return view('salary_claim');
	}
	
	public function getrecord($emp_id){
		$records = DB::table('servicebooks')
					->select('basic_pay', 'da')
					->where('emp_id', $emp_id)
					->orderBy('service_id', 'desc')
					->first();
		return json_encode($records);
	}
	
	public function insert_sallary_claim(Request $request){
		$emp_id = Input::get('emp_id');
		$basic_pay = Input::get('basic_pay');
		$dearness_allowance = Input::get('dearness_allowance');
		$hra = Input::get('hra');
		$medical_allowance = Input::get('medical_allowance');
		$conveyance_allowance = Input::get('conveyance_allowance');
		$city_allowance = Input::get('city_allowance');
		$others = Input::get('others');
		foreach($emp_id as $key => $n ){
			$data = array( 
						'emp_id'=>$emp_id[$key],
						'basic_pay'=>$basic_pay[$key],
						'dearness_allowance'=>$dearness_allowance[$key],
						'hra'=>$hra[$key],
						'medical_allowance'=>$medical_allowance[$key],
						'conveyance_allowance'=>$conveyance_allowance[$key],
						'city_allowance'=>$city_allowance[$key],
						'others'=>$others[$key],
						'gross_salary'=>$basic_pay[$key]+$dearness_allowance[$key]+$hra[$key]+$medical_allowance[$key]+$conveyance_allowance[$key]+$city_allowance[$key]+$others[$key],
						'month'=>Input::get('month')
					);
			salary_claims::insert($data);
			return redirect('/salary_claim');
		}		
	}
	
	public function salary_view(){
		$employees = employee::all();
        return view('salary_view', compact('employees'));
	}
	
	public function salary_deduction(){
		return view('salary_deduction');
	}
	
	public function loan_calculation($emp_id){
		$loans = DB::table('loan_trasection')
					->where([['emp_id', $emp_id], ['status', '3'], ['loan_type_id', '4']])
					->orderBy('loan_transection_id', 'desc')
					->first();
		return json_encode($loans);
	}
	
	public function housing_loan($emp_id){
		$loans = DB::table('loan_trasection')
					->where([['emp_id', $emp_id], ['status', '3'], ['loan_type_id', '1']])
					->orderBy('loan_transection_id', 'desc')
					->first();
		return json_encode($loans);
	}
	
	public function car_loan($emp_id){
		$loans = DB::table('loan_trasection')
					->where([['emp_id', $emp_id], ['status', '3'], ['loan_type_id', '2']])
					->orderBy('loan_transection_id', 'desc')
					->first();
		return json_encode($loans);
	}
	
	public function bike_loan($emp_id){
		$loans = DB::table('loan_trasection')
					->where([['emp_id', $emp_id], ['status', '3'], ['loan_type_id', '3']])
					->orderBy('loan_transection_id', 'desc')
					->first();
		return json_encode($loans);
	}
	
	public function salary_deduction_insert(Request $request){
		$emp_id = Input::get('emp_id');
		$gpf_deduction = Input::get('gpf_deduction');
		foreach($emp_id as $key => $n ){
			$data = array('emp_id'=>$emp_id[$key],
						'gpf_deduction'=>$gpf_deduction[$key]);
				//		dd($data);
				salary_deduction::insert($data);
						
		}
		//salary_deduction::create(Request::all());		
		//return redirect('/salary_deduction');
	}
	
	public function salary_details(){		
		return view('salary_details');
	}
	
	public function salary_claim_batch(){
		$views = DB::table('employees')->get();		
        return view('salary_claim_batch', compact('views'));
	}
	
	public function salary_deduction_batch(){
		$views = DB::table('employees')->get();		
        return view('salary_deduction_batch', compact('views'));
	}
}
