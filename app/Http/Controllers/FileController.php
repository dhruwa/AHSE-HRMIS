<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\upload;
use Input;
use App\Http\Controllers\FileController;

class FileController extends Controller
{
    public function index(){
        return view('uploadd');
    }
  
    public function create(){
        //
    }
   
	public function imgup(Request $request){
        //servicebook::create(Request::all());
		//return redirect('/servicebook');
		
		$user = new upload;
		
		$user->demo= Input::get('img');
		if(Input::hasFile('image')){
			$file=Input::file('image');
			$file->move(public_path(). '/', $file->getClientOriginalName());

			$user->img = $file->getClientOriginalName();
		}
		$user->save();
		return 'save';
		
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
