<?php

namespace App\Http\Controllers;

use Request;
use App\employee;
use App\ot_generation;
use DB, Input, Auth;

class OtController extends Controller
{
    public function ot_view(){
		return view('ot_view');
	}
	
	public function ot_calculation(){
		$month = Input::get('month');
		$year = Input::get('year');
		$calculations = DB::table('attendances')->select('emp_id','month','year',DB::raw('SUM(out_time) as out_time'))->groupBy('emp_id','month','year')
						->where([['month', $month], ['year', $year]])->get();
		//foreach ($calculations as $calculation){
			//echo "$calculation->emp_id</br>";
			//echo "$calculation->out_time</br>";
			//$out_time = substr($calculation->out_time, 0, 2);
			//$ot = $out_time - 51;
			//echo "$ot</br>";
			//$time1 = '17:00:00';
			//$time2 = $calculation->out_time;
			//list($hours, $minutes) = explode(':', $time1);
			//$startTimestamp = mktime($hours, $minutes);

			//list($hours, $minutes) = explode(':', $time2);
			//$endTimestamp = mktime($hours, $minutes);

			//$seconds = $endTimestamp - $startTimestamp;
			//$minutes = ($seconds / 60) % 60;
			//$hours = floor($seconds / (60 * 60));
			
			//echo "Over Time: <b>$calculation->emp_id;</b> is<b>$hours</b></br>";
		//}
		return view('ot_calculation')->with('calculations', $calculations);
	}
	
	public function ot_rtgs(){
		return view('ot_rtgs');
	}
	
	public function generate_ot(Request $request){
		$emp_id = Input::get('emp_id');
		$working_days = Input::get('working_days');
		$ot_hours = Input::get('ot_hours');
		$amount = Input::get('amount');
		$month = Input::get('month');
		$year = Input::get('year');
		foreach($emp_id as $key => $n ){
			$data = array(
				'emp_id'=>$emp_id[$key],
				'working_days'=>$working_days[$key],
				'ot_hours'=>$ot_hours[$key],
				'amount'=>$amount[$key],
				'month'=>$month[$key],
				'year'=>$year[$key]
			);
		ot_generation::insert($data);
		}
		return redirect('/ot_rtgs');
	}
	
	public function generate_ot_rtgs(){
		$month = Input::get('month');
		$year = Input::get('year');
		$loans = DB::table('ot_genneration')          
			->where([['month', $month], ['year', $year]])
            ->get();
		return view('ot_rtgs_view', compact('loans'));
	}
	
}
