<?php

namespace App\Http\Controllers;
use Request;
use App\qualification;
use Kamaln7\Toastr\Facades\Toastr;
use DB;

class QualificationController extends Controller
{  
	public function __construct(){
        $this->middleware('auth');
    }
		
    public function index(){
        return view("qualification");
    }
    
    public function create(){
        //
    }

    public function store(Request $request){
		qualification::create(Request::all());
		return redirect("qualification");
    }
	
	public function delete_qualification($qualification_id){
        $del = DB::table('qualifications')->where('qualification_id', $qualification_id)->delete();
		return redirect("qualification_view");
    }
	
	public function edit_qualification($qualification_id){
        $row = DB::table('qualifications')->where('qualification_id', $qualification_id)->first();
		return view('qualification_edit_view')->with('row', $row);
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
