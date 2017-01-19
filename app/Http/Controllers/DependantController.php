<?php

namespace App\Http\Controllers;
use App\dependant;
use App\logbook;
use Request;
use DB, Auth;

class DependantController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        return view("dependant");
    }
	
	public function dependantinsert(Request $request){
        dependant::create(Request::all());
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Dependant Insert',
			'role' => $row->role,
			'table_name' => 'dependants'
		];
		logbook::insert($data);
		return redirect("dependantview");
    }
	
	public function update_dependant(Request $request){
		$post = Request::all();
		$data =[
			'emp_id' => $post['emp_id'],
			'relation' => $post['relation'],
			'first_name' => $post['first_name'],
			'last_name' => $post['last_name'],
			'dob' => $post['dob'],
			'profession' => $post['profession'],
			'status' => $post['status']
		];		
        $i = DB::table('dependants')->where('dependant_id', $post['dependant_id'])->update($data);
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Dependant Update',
			'role' => $row->role,
			'table_name' => 'dependants'
		];
		logbook::insert($data);
		return redirect("dependantview");
    }

    public function dependantview(){		
		$dependants = dependant::all();
        return view('dependantview', compact('dependants'));
    }
	
	public function delete_dependant($dependant_id){
        $del = DB::table('dependants')->where('dependant_id', $dependant_id)->delete();
		$id = Auth::user()->id;
		$row = DB::table('users')->where('id', $id)->first();
		$data =[
			'id' => $id,
			'action' => 'Dependant Delete',
			'role' => $row->role,
			'table_name' => 'dependants'
		];
		logbook::insert($data);
		return redirect('/dependantview');
    }
	
	public function edit_dependant($dependant_id){
        $row = DB::table('dependants')->where('dependant_id', $dependant_id)->first();
		return view('dependant_edit_view')->with('row', $row);
    }
	
	public function dependantinsert1(Request $request){
        dependant::create(Request::all());
		return redirect("dependantview");
    }

    public function store(Request $request){
        //
    }
   
    public function show($id){
        //
    }
    
    public function edit($id){
        //
    }
   
    public function update(Request $request, $id){
        //
    }
    
    public function destroy($id){
        //
    }
}
