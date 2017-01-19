<?php

namespace App\Http\Controllers;
use Request;
use Kamaln7\Toastr\Facades\Toastr;
use App\employee;
use App\logbook;
use Validator;
use DB, Auth;

class EmployeeController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	
    public function index(){
        return view("employee");
    }
	
	public function empstore(Request $request){	
		employee::create(Request::all());
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Employee Insert',
			'role' => $row->role,
			'table_name' => 'employees'
		];
		logbook::insert($data);
		return redirect('/employee_view');
    }
	
	public function delete_employee($del_emp_id){
        $del = DB::table('employees')->where('emp_id', $del_emp_id)->delete();
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Employee Delete',
			'role' => $row->role,
			'table_name' => 'employees'
		];
		logbook::insert($data);
		return redirect('/employee_view');
    }
	
	public function edit_employee($emp_id){
        $row = DB::table('employees')->where('emp_id', $emp_id)->first();
		return view('employee_edit_view')->with('row', $row);
    }
	
	public function update_employee(Request $request){
		$post = Request::all();
		$data =[
			'emp_qualification_id' => $post['emp_qualification_id'],
			'emp_f_name' => $post['emp_f_name'],
			'emp_m_name' => $post['emp_m_name'],
			'emp_l_name' => $post['emp_l_name'],
			'post_id' => $post['post_id'],
			'fld_DeptID' => $post['fld_DeptID'],
			'emp_dob' => $post['emp_dob'],
			'emp_gender' => $post['emp_gender'],
			'emp_type' => $post['emp_type'],
			'emp_blood_group' => $post['emp_blood_group'],
			'emp_contact_no' => $post['emp_contact_no'],
			'emp_alt_contact_no' => $post['emp_alt_contact_no'],
			'bank_account_no' => $post['bank_account_no'],
			'emp_present_house_no' => $post['emp_present_house_no'],
			'emp_present_locality' => $post['emp_present_locality'],
			'emp_present_city' => $post['emp_present_city'],
			'emp_present_district' => $post['emp_present_district'],
			'emp_permanent_house_no' => $post['emp_permanent_house_no'],
			'emp_permanent_locality' => $post['emp_permanent_locality'],
			'emp_permanent_city' => $post['emp_permanent_city'],
			'emp_permanent_district' => $post['emp_permanent_district'],
			'emp_cast' => $post['emp_cast'],
			'emp_religion' => $post['emp_religion'],
			'submission_date' => $post['submission_date']
		];		
        $i = DB::table('employees')->where('emp_id', $post['emp_id'])->update($data);
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Employee Update',
			'role' => $row->role,
			'table_name' => 'employees'
		];
		logbook::insert($data);
		return redirect("/employee_view");
    }

    public function create(){
        
    }
    
    public function store(Request $request){
       
    }
	
    public function show($id){
        
    }

    public function edit($id){
       
    }
    
    public function update(Request $request, $id){
        
    }

    public function destroy($id){
        
    }
}
