<?php

namespace App\Http\Controllers;
use Request;
use App\salary_claims;
use App\employee;
use App\salary_deduction;
use DB, Crypt;
use Input;
use Excel;
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
		//Claims
		$emp_id = Input::get('emp_id');
		$basic_pay = Input::get('basic_pay');
		$dearness_allowance = Input::get('dearness_allowance');
		$hra = Input::get('hra');
		$medical_allowance = Input::get('medical_allowance');
		$conveyance_allowance = Input::get('conveyance_allowance');
		$city_allowance = Input::get('city_allowance');
		$others = Input::get('others');		
		//Deductions		
		$gpf_deduction = Input::get('gpf_deduction');
		$nps_deduction = Input::get('nps_deduction');
		$festival_deduction = Input::get('festival_deduction');
		$house_building_deduction = Input::get('house_building_deduction');
		$car_loan_deduction = Input::get('car_loan_deduction');
		$motor_cycle_deduction = Input::get('motor_cycle_deduction');
		$group_deduction = Input::get('group_deduction');
		$salary_saving_deduction = Input::get('salary_saving_deduction');
		$professional_tax_deduction = Input::get('professional_tax_deduction');
		$income_tax_deduction = Input::get('income_tax_deduction');
		$welfare_deduction = Input::get('welfare_deduction');
		$other_deduction = Input::get('other_deduction');
		$union_fee = Input::get('union_fee');
		$kss = Input::get('kss');
		$glsi = Input::get('glsi');
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
						'month'=>Input::get('month'),
						'year'=>Input::get('year'),
						'status'=>Input::get('status')
					);
			salary_claims::insert($data);
			$data1 = array( 
						'emp_id'=>$emp_id[$key],	
						'gpf_deduction'=>$gpf_deduction[$key],
						'nps_deduction'=>$nps_deduction[$key],
						'festival_deduction'=>$festival_deduction[$key],
						'house_building_deduction'=>$house_building_deduction[$key],
						'car_loan_deduction'=>$car_loan_deduction[$key],
						'motor_cycle_deduction'=>$motor_cycle_deduction[$key],
						'group_deduction'=>$group_deduction[$key],
						'salary_saving_deduction'=>$salary_saving_deduction[$key],
						'professional_tax_deduction'=>$professional_tax_deduction[$key],
						'income_tax_deduction'=>$income_tax_deduction[$key],
						'welfare_deduction'=>$welfare_deduction[$key],
						'other_deduction'=>$other_deduction[$key],
						'union_fee' =>$union_fee[$key],
						'kss' =>$kss[$key],
						'glsi' =>$glsi[$key],
						'total_deduction'=>$gpf_deduction[$key]+$nps_deduction[$key]+$festival_deduction[$key]+$house_building_deduction[$key]+$car_loan_deduction[$key]+$motor_cycle_deduction[$key]+$group_deduction[$key]+$salary_saving_deduction[$key]+$professional_tax_deduction[$key]+$income_tax_deduction[$key]+$welfare_deduction[$key]+$other_deduction[$key]+$union_fee[$key]+$kss[$key]+$glsi[$key],
						'month'=>Input::get('month'),
						'year'=>Input::get('year'),
						'status'=>Input::get('status')
					);
			salary_deduction::insert($data1);			
		}
		return redirect('/salary_claim_batch');		
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
		$nps_deduction = Input::get('nps_deduction');
		$festival_deduction = Input::get('festival_deduction');
		$house_building_deduction = Input::get('house_building_deduction');
		$car_loan_deduction = Input::get('car_loan_deduction');
		$motor_cycle_deduction = Input::get('motor_cycle_deduction');
		$group_deduction = Input::get('group_deduction');
		$salary_saving_deduction = Input::get('salary_saving_deduction');
		$professional_tax_deduction = Input::get('professional_tax_deduction');
		$income_tax_deduction = Input::get('income_tax_deduction');
		$welfare_deduction = Input::get('welfare_deduction');
		$other_deduction = Input::get('other_deduction');
		
		foreach($emp_id as $key => $n ){
			$data = array('emp_id'=>$emp_id[$key],
						'gpf_deduction'=>$gpf_deduction[$key],
						'nps_deduction'=>$nps_deduction[$key],
						'festival_deduction'=>$festival_deduction[$key],
						'house_building_deduction'=>$house_building_deduction[$key],
						'car_loan_deduction'=>$car_loan_deduction[$key],
						'motor_cycle_deduction'=>$motor_cycle_deduction[$key],
						'group_deduction'=>$group_deduction[$key],
						'salary_saving_deduction'=>$salary_saving_deduction[$key],
						'professional_tax_deduction'=>$professional_tax_deduction[$key],
						'income_tax_deduction'=>$income_tax_deduction[$key],
						'welfare_deduction'=>$welfare_deduction[$key],
						'other_deduction'=>$other_deduction[$key],
						'total_deduction'=>$gpf_deduction[$key]+$nps_deduction[$key]+$festival_deduction[$key]+$house_building_deduction[$key]+$car_loan_deduction[$key]+$motor_cycle_deduction[$key]+$group_deduction[$key]+$salary_saving_deduction[$key]+$professional_tax_deduction[$key]+$income_tax_deduction[$key]+$welfare_deduction[$key]+$other_deduction[$key],
						'month'=>Input::get('month'),
						'year'=>Input::get('year')						
					);
				salary_deduction::insert($data);						
		}
		//salary_deduction::create(Request::all());		
		//return redirect('/salary_deduction');
	}
	
	public function salary_details($emp_id, $month, $year){		
		$loans = DB::table('salary_claim')
					->where([['emp_id', $emp_id], ['month', 'January'], ['year', '2016']])
					->orderBy('salary_claim_id', 'desc')
					->first();
		return json_encode($loans);
	}
	
	public function salary_claim_batch(){
		$views = DB::table('servicebooks')->where('status', '1')->get();		
        return view('salary_claim_batch', compact('views'));
	}
	
	public function salary_deduction_batch(){
		$views = DB::table('employees')->get();		
        return view('salary_deduction_batch', compact('views'));
	}
	
	public function salary_edit(){		
        return view('salary_edit');
	}
	
	public function edit_salary($emp_id){
		$loans = DB::table('salary_claims')
					->where('emp_id', $emp_id)
					->orderBy('salary_claim_id', 'desc')
					->first();
		return json_encode($loans);
	}
	
	public function update_sallary_claim(Request $request){
		$post = Request::all();
		$data =[
			'salary_claim_id' => $post['salary_claim_id'],
			'basic_pay' => $post['basic_pay'],
			'dearness_allowance' => $post['dearness_allowance'],
			'hra' => $post['hra'],
			'medical_allowance' => $post['medical_allowance'],
			'conveyance_allowance' => $post['conveyance_allowance'],
			'city_allowance' => $post['city_allowance'],
			'others' => $post['others'],
			'gross_salary' => $post['gross_salary']
		];
		
        $i = DB::table('salary_claims')->where('salary_claim_id', $post['salary_claim_id'])->update($data);
		return redirect("/salary_edit");
    }
	
	public function salary_deduction_edit(){		
        return view('salary_deduction_edit');
	}
	
	public function salary_deduction_details($emp_id){
		$loans = DB::table('salary_deductions')
					->where('emp_id', $emp_id)
					->orderBy('salary_deduction_id', 'desc')
					->first();
		return json_encode($loans);
	}
	
	public function salary_deduction_update(Request $request){
		$post = Request::all();
		$data =[
			'salary_deduction_id' => $post['salary_deduction_id'],
			'gpf_deduction' => $post['gpf_deduction'],
			'nps_deduction' => $post['nps_deduction'],
			'festival_deduction' => $post['festival_deduction'],
			'house_building_deduction' => $post['house_building_deduction'],
			'car_loan_deduction' => $post['car_loan_deduction'],
			'motor_cycle_deduction' => $post['motor_cycle_deduction'],
			'group_deduction' => $post['group_deduction'],
			'salary_saving_deduction' => $post['salary_saving_deduction'],
			'professional_tax_deduction' => $post['professional_tax_deduction'],
			'income_tax_deduction' => $post['income_tax_deduction'],
			'welfare_deduction' => $post['welfare_deduction'],
			'other_deduction' => $post['other_deduction'],
			'total_deduction' => $post['total_deduction']
		];
		
        $i = DB::table('salary_deductions')->where('salary_deduction_id', $post['salary_deduction_id'])->update($data);
		return redirect("/salary_deduction_edit");
    }
	
	public function generate_rtgs(){		
		return view('generate_rtgs');
	}
	
	public function rtgs(){
		$month = Input::get('month');
		$year = Input::get('year');
		$loans = DB::table('salary_claims')
            ->join('salary_deductions', 'salary_claims.emp_id', '=', 'salary_deductions.emp_id')
            ->select('salary_claims.*', 'salary_deductions.*')
			->where([['salary_claims.month', $month], ['salary_claims.year', $year], ['salary_deductions.month', $month], ['salary_deductions.year', $year]])
            ->get();
		$i = DB::table('salary_claims')->where([['month', $month], ['year', $year]])->update(['status' => 2]);
		$j = DB::table('salary_deductions')->where([['month', $month], ['year', $year]])->update(['status' => 2]);
		return view('rtgs', compact('loans'));
	}	
	
	public function salary_statement(){
		return view('salary_statement');
	}
	
	public function generate_salary_statement(){
		$month = Input::get('month');
		$year = Input::get('year');
		$emp_id = Input::get('emp_id');
		$loan = DB::table('salary_claims')
            ->join('salary_deductions', 'salary_claims.emp_id', '=', 'salary_deductions.emp_id')
            ->select('salary_claims.*', 'salary_deductions.*')
			->where([['salary_claims.month', $month], ['salary_claims.year', $year], ['salary_claims.emp_id', $emp_id], ['salary_claims.status', '2']])
            ->get();
		return view('generate_salary_statement')->with('loan', $loan);
	}
	
	public function kss_upload(){
		return view('kss_upload');
	}
}
