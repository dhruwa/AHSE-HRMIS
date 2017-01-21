<?php

namespace App\Http\Controllers;
use Request;
use Illuminate\Support\Facades\Auth;
use DB, Crypt;
use App\loanmaster;
use App\loantransaction;
use App\logbook;

class LoanController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	
    public function index(){
        $emp_id = Auth::user()->id;
		$row = DB::table('employees')->where('emp_id', $emp_id)->first();
		return view('applyloan')->with('row', $row);
    }
	
	public function loaninsert(Request $request){
		loanmaster::create(Request::all());
		loantransaction::create(Request::all());
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Employee Loan Apply',
			'role' => $row->role,
			'table_name' => 'employee_loan, loan_trasection'
		];
		logbook::insert($data);
		return redirect("view_loan_status");
	}
	
	public function apply_loan_view(){
		$emp_id = Auth::user()->id;
		$row = DB::table('employees')->where('emp_id', $emp_id)->first();
		$loan_views = DB::table('loan_trasection')->where('fld_DeptID', $row->fld_DeptID)->get();
		return view('apply_loan_view')->with('loan_views', $loan_views);
	}
	
	public function show_loan_details($loan_transection_id){
		$row = DB::table('loan_trasection')->where('loan_transection_id', $loan_transection_id)->first();
		return view('show_loan_details')->with('row', $row);	
	}
	
	public function loan_forward(Request $request){
		$post = Request::all();
		$data =[
			'no_of_instalment' => $post['no_of_instalment'],
			'emi' => $post['emi'],
			'interest_amount' => $post['interest_amount'],
			'pricipal_ammount' => $post['pricipal_ammount'],
			'no_of_instalment_interest' => $post['no_of_instalment_interest'],
			'interest_emi' => $post['interest_emi'],
			'status' => $post['status'],
			'forwarded_by' => $post['forwarded_by'],
			'forwarded_on' => $post['forwarded_on'],
			'remarks' => $post['remarks']
		];
		$i = DB::table('loan_trasection')->where('loan_transection_id', $post['loan_transection_id'])->update($data);
		$j = DB::table('employee_loan')->where('emp_loan_id', $post['loan_transection_id'])->update(['status' => 2]);
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Employee Loan Forward',
			'role' => $row->role,
			'table_name' => 'employee_loan, loan_trasection'
		];
		logbook::insert($data);
		return redirect("/apply_loan_view");
	}
	
	public function loanapplication(){	
		$loan_views = DB::table('loan_trasection')->get();
		return view('apply_loan_admin_view')->with('loan_views', $loan_views);
	}
	
	public function show_loan_detail($loan_transection_id){
		$row = DB::table('loan_trasection')->where('loan_transection_id', $loan_transection_id)->first();
		return view('show_loan_detail')->with('row', $row);	
	}
	
	public function approved_loan($loan_transection_id){		
		$loan_transection_id = Crypt::decrypt($loan_transection_id);
		$i = DB::table('loan_trasection')->where('loan_transection_id', $loan_transection_id)->update(['status' => 3]);
		$j = DB::table('employee_loan')->where('emp_loan_id', $loan_transection_id)->update(['status' => 3]);
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Employee Loan Approve',
			'role' => $row->role,
			'table_name' => 'employee_loan, loan_trasection'
		];
		logbook::insert($data);
		return redirect('/loanapplication');
	}
	
	public function rejected_loan($loan_transection_id){	
		$loan_transection_id = Crypt::decrypt($loan_transection_id);	
		$i = DB::table('loan_trasection')->where('loan_transection_id', $loan_transection_id)->update(['status' => 4]);
		$j = DB::table('employee_loan')->where('emp_loan_id', $loan_transection_id)->update(['status' => 4]);
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Employee Loan Rejected',
			'role' => $row->role,
			'table_name' => 'employee_loan, loan_trasection'
		];
		logbook::insert($data);
		return redirect('/loanapplication');
	}
	
	public function back_to_branch_loan($loan_transection_id){	
		$loan_transection_id = Crypt::decrypt($loan_transection_id);		
		$i = DB::table('loan_trasection')->where('loan_transection_id', $loan_transection_id)->update(['status' => 1]);
		$j = DB::table('employee_loan')->where('emp_loan_id', $loan_transection_id)->update(['status' => 1]);
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Employee Loan Back to Branch',
			'role' => $row->role,
			'table_name' => 'employee_loan, loan_trasection'
		];
		logbook::insert($data);
		return redirect('/loanapplication');
	}
		
	public function interest($loan_type_id){
		$interests = DB::table('loan_type')->select('interest')->where('loan_type_id', $loan_type_id)->first();
		return json_encode($interests);
	}
	
	public function view_loan_status(){
		$emp_id = Auth::user()->id;
		$row = DB::table('employees')->where('emp_id', $emp_id)->first();
		$view_loan_status = DB::table('loan_trasection')->where('emp_id', $row->emp_id)->get();
		return view('view_loan_status')->with('view_loan_status', $view_loan_status);		
	}

    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
