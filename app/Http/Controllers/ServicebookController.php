<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\servicebook;
use App\employee;
use DB;
use Illuminate\Http\Response;

class ServicebookController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
	
    public function index(){
        return view('servicebook');
    }    

	public function serviceinsert(Request $request){
		//$post = Request::all();
		$this->validate($request, [		
            'service_image' => 'file|mimes:jpeg,png,jpg,gif,svg,pdf|max:2048',
        ]);
        
		$servicebook = new servicebook($request->input()) ;
		
		if($file = $request->hasFile('service_image')) {
            
            $file = $request->file('service_image') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/images/' ;
            $file->move($destinationPath,$fileName);
            $servicebook->service_image = $fileName ;
        }
		$j = DB::table('servicebooks')->where('emp_id', $request['emp_id'])->update(['status' => 0]);
		$servicebook->save() ;
        return redirect('/servicebook');		
    }
	
	public function servicebookview(){
		$employees = employee::all();
        return view('servicebookview', compact('employees'));        
    }
	
	public function detail($emp_id){
        $row = DB::table('servicebooks')->where('emp_id', $emp_id)->get();
		return view('servicebview')->with('row', $row);
    }
	
	public function servicebook_detail_view($service_id){
        $full = DB::table('servicebooks')->where('service_id', $service_id)->first();
		return view('servicebook_details_view')->with('full', $full);
    }
	
	public function post_scale($post_id){
		$employees = DB::table('posts')->where([['fld_PostID', $post_id], ['fld_Status', 1]])->first();
		return json_encode($employees);
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
