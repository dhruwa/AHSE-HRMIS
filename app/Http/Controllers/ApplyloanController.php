<?php

namespace App\Http\Controllers;
use Request;
use App\apply_loan;
use DB;
use Illuminate\Support\Facades\Auth;

class ApplyloanController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	
    public function index(){
		$emp_id = Auth::user()->id;
		$row = DB::table('employees')->where('emp_id', $emp_id)->first();
		return view('applyloan')->with('row', $row);
	}
	
	public function loanapply(){
		apply_loan::create(Request::all());
		return redirect('/applyloan');
	}
	
	public function viewloan(){
		$loans = apply_loan::all();
        return view('loankview', compact('apply_loans'));
	}
}
