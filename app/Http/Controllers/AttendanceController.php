<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Input;
use App\attendance;
use App\kss;
use DB;
use Excel;
use Paginaton;

class AttendanceController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	
	public function showattendanceform(){
		return view('attendance');
	}
	
	public function attendanceentry(Request $request){
		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();
			if(!empty($data) && $data->count()){
				foreach ($data->toArray() as $key => $value) {
					if(!empty($value)){
						foreach ($value as $v) {
							//echo $ot = $v['in_time'] + 15;
							$insert[] = [
								'emp_id' => $v['emp_id'], 
								'in_time' => $v['in_time'], 
								'out_time' => $v['out_time'],
								'date' => $v['date'], 
								'month' => Input::get('month'), 
								'year' => Input::get('year')
							];
						}
					}
				}				
				if(!empty($insert)){
					attendance::insert($insert);
					return redirect('/showattendance');
				}
			}
		}
		return redirect('/showattendance');
	}	
	
	public function showattendance(){        
		$attendances = attendance::orderBy('attendance_id', 'ASC')->paginate(10); 
        return view('attendanceview', compact('attendances'));
    }
	
	public function check_leave($emp_id){
		$rows = DB::table('leave_transaction')->where('emp_id', $emp_id)->get();
		//dd($rows);
		return view('check_leave', compact('rows')); 
	}
	
	public function kss_insert(Request $request){
		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();
			if(!empty($data) && $data->count()){
				foreach ($data->toArray() as $key => $value) {
					if(!empty($value)){
						foreach ($value as $v) {
							//echo $ot = $v['in_time'] + 15;
							$insert[] = [
								'emp_id' => $v['emp_id'], 
								'loan_amount' => $v['loan_amount'], 
								'interest' => $v['interest'],
								'subscrptn' => $v['subscrptn'], 
								'recovery' => $v['recovery'], 
								'total' => $v['total'],
								'month' => Input::get('month'), 
								'year' => Input::get('year'),
								'status' => '1'
							];
						}
					}
				}				
				if(!empty($insert)){
					kss::insert($insert);
					return redirect('/kss_upload');
				}
			}
		}
		return redirect('/kss_upload');
	}
}
