<?php

namespace App\Http\Controllers;
use App\employee;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class EmployeeViewController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $employees = employee::all();
        return view('employeeview', compact('employees'));
    }
	
	public function show($emp_id){
        $row = DB::table('employees')->where('emp_id', $emp_id)->first();
		return view('employee_details_view')->with('row', $row);
    }    
}
