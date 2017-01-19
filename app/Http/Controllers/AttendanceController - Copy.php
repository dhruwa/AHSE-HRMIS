<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Input;
use App\attendance;
use DB;
use Excel;

class AttendanceController extends Controller
{
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
						echo $ot = $v['in_time'] + 15;
							$insert[] = [
								'emp_name' => $v['emp_name'], 
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
					//attendance::insert($insert);
					//return redirect('/showattendance');
				}
			}
		}
		//return redirect('/showattendance');
	}
	
	public function showattendance(){        
		$attendances = attendance::orderBy('attendance_id', 'DESC')->get();
        return view('attendanceview', compact('attendances'));
    }
}
