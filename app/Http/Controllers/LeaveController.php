<?php

namespace App\Http\Controllers;
use Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\leavemaster;
use App\leavetransaction;
use App\leave_add;

class LeaveController extends Controller
{  
	public function __construct(){
        $this->middleware('auth');
    }

	public function leave_add(){
		return view('leave_add');
	}
	
	public function add_leave(Request $request){
		leave_add::create(Request::all());
		return view('leave_add');
	}
	
    public function index(){
        $emp_id = Auth::user()->id;
		$row = DB::table('employees')->where('emp_id', $emp_id)->first();
		return view('applyleave')->with('row', $row);
    }
	
	public function leaveapply(Request $request){
		leavemaster::create(Request::all());
		leavetransaction::create(Request::all());
		return redirect('view_leave_status');
	}
	
	public function view_leave_status(){
		$emp_id = Auth::user()->id;
		$row = DB::table('employees')->where('emp_id', $emp_id)->first();
		$view_leave_status = DB::table('leave_transaction')->where('emp_id', $row->emp_id)->get();
		return view('view_leave_status')->with('view_leave_status', $view_leave_status);
	}
	
	public function view_available_leave(){
		$emp_id = Auth::user()->id;
		$row = DB::table('leave_balance')->where('emp_id', $emp_id)->get();
		return view('view_available_leave')->with('row', $row);
	}

	public function viewapplyleave(){
		$emp_id = Auth::user()->id;
		$row = DB::table('employees')->where('emp_id', $emp_id)->first();
		$viewapplyleave = DB::table('leave_transaction')->where('fld_DeptID', $row->fld_DeptID)->get();
		return view('viewapplyleave')->with('viewapplyleave', $viewapplyleave);
	}
	
	public function show_details($leave_transaction_id){
		$row = DB::table('leave_transaction')->where('leave_transaction_id', $leave_transaction_id)->first();
		return view('viewdetailleave')->with('row', $row);
	}
	
	public function forward(Request $request){
		$post = Request::all();
		$data =[
			'status' => $post['status'],
			'sh_forwarded_on' => $post['sh_forwarded_on'],
			'sh_forwarded_by' => $post['sh_forwarded_by'],
			'sh_remarks' => $post['sh_remarks']
		];
		$i = DB::table('leave_transaction')->where('leave_transaction_id', $post['leave_transaction_id'])->update($data);
		$j = DB::table('leave_master')->where('leave_master_id', $post['leave_transaction_id'])->update(['status' => 2]);
		return redirect("/viewapplyleave");
	}
	
	public function manageleave(){
		$emp_id = Auth::user()->id;
		$row = DB::table('employees')->where('emp_id', $emp_id)->first();
		$viewapplyleavebruach = DB::table('leave_transaction')->where('fld_DeptID', $row->fld_DeptID)->get();
		return view('viewapplyleavebruach')->with('viewapplyleavebruach', $viewapplyleavebruach);
	}
	
	public function show_leave_details($leave_transaction_id){
		$row = DB::table('leave_transaction')->where('leave_transaction_id', $leave_transaction_id)->first();
		return view('view_detail_leave_branch')->with('row', $row);
	}
	
	public function brforward(Request $request){
		$post = Request::all();
		$data =[
			'status' => $post['status'],
			'br_forwarded_on' => $post['br_forwarded_on'],
			'br_forwarded_by' => $post['br_forwarded_by'],
			'br_remarks' => $post['br_remarks']
		];
		$i = DB::table('leave_transaction')->where('leave_transaction_id', $post['leave_transaction_id'])->update($data);
		$j = DB::table('leave_master')->where('leave_master_id', $post['leave_transaction_id'])->update(['status' => 3]);
		return redirect('/manageleave');
	}
	
	public function leaveapplication(){
		$leavetransactions = leavetransaction::All();
        return view('view_all_leaves', compact('leavetransactions')); 
	}
	
	public function show_leave($leave_transaction_id){
		$row = DB::table('leave_transaction')->where('leave_transaction_id', $leave_transaction_id)->first();
		return view('view_show_leave')->with('row', $row);
	}
	
	public function approved($leave_transaction_id){		
		$i = DB::table('leave_transaction')->where('leave_transaction_id', $leave_transaction_id)->update(['status' => 4]);
		$j = DB::table('leave_master')->where('leave_master_id', $leave_transaction_id)->update(['status' => 4]);
		$row = DB::table('leave_transaction')->where('leave_transaction_id', $leave_transaction_id)->first();
		$k = DB::table('leave_balance')->where([['emp_id', $row->emp_id], ['leave_type_id', $row->leave_type_id]])->decrement('balance', $row->no_of_day);
		return redirect('/leaveapplication');
	}
	
	public function reject($leave_transaction_id){
		$i = DB::table('leave_transaction')->where('leave_transaction_id', $leave_transaction_id)->update(['status' => 5]);
		$j = DB::table('leave_master')->where('leave_master_id', $leave_transaction_id)->update(['status' => 5]);
		return redirect('/leaveapplication');
	}
	
	public function backtobranch($leave_transaction_id){
		$i = DB::table('leave_transaction')->where('leave_transaction_id', $leave_transaction_id)->update(['status' => 2]);
		$j = DB::table('leave_master')->where('leave_master_id', $leave_transaction_id)->update(['status' => 2]);
		return redirect('/leaveapplication');
	}
	
	public function show_balance_leave($emp_id, $leave_type_id){
		$row = DB::table('leave_balance')->where([['emp_id', $emp_id], ['leave_type_id', $leave_type_id]])->get();
		return view('show_balance_leave')->with('row', $row);
	}	
}
