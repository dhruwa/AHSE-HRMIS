<?php

namespace App\Http\Controllers;

use Request;
use App\parameter;
use App\ParameterValue;
use DB;
use Input;

class ParameterController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	
    public function index(){
		return view('parameter');
	}
	
	public function parameter_insert(Request $request){
		parameter::create(Request::all());
		return redirect('/parameter');
	}
	
	public function parameter_view(){		
		$parameters = ParameterValue::all();
        return view('parameter_view', compact('parameters'));
    }
	
	public function parameter_edit($id){
        $row = DB::table('parameter_values')->where('id', $id)->first();
		return view('parameter_edit_view')->with('row', $row);
    }
	
	public function parameter_update(Request $request){
		$post = Request::all();
		$data =[
			'parameter_id' => $post['parameter_id'],
			'value' => $post['value'],
			'effective_from' => $post['effective_from'],
			'effective_to' => $post['effective_to']
		];		
        $i = DB::table('parameter_values')->where('id', $post['id'])->update($data);
		return redirect("parameter_view");
    }
	
	public function parameter_value(){
		return view('parameter_value');
	}
	
	public function parameter_value_insert(Request $request){
		$post = Request::all();
		$j = DB::table('parameter_values')->where('parameter_id', $post['parameter_id'])->update(['status' => 0]);
		ParameterValue::create(Request::all());
		return redirect('/parameter_value');
	}
}
