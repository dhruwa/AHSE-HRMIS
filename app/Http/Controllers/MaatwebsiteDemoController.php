<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Input;
use App\item;
use DB;
use Excel;

class MaatwebsiteDemoController extends Controller
{
    public function importExport(){
		return view('importExport');
	}
	
	//Working Code
	//public function importExcel()
	//{
		//if(Input::hasFile('import_file')){
			//$path = Input::file('import_file')->getRealPath();
			//$data = Excel::load($path, function($reader) {
			//})->get();
			//if(!empty($data) && $data->count()){
				//foreach ($data as $key => $value) {
					//$insert[] = ['title' => $value->title, 
					//'description' => $value->description, 
					//'name' => Input::get('name')];
				//}
				//if(!empty($insert)){
					//DB::table('items')->insert($insert);
					//dd($insert);
				//}
			//}
		//}
		//return back();
	//}	
	
	public function importExcel(Request $request){
		if($request->hasFile('import_file')){
			$path = $request->file('import_file')->getRealPath();
			$data = Excel::load($path, function($reader) {})->get();
			if(!empty($data) && $data->count()){
				foreach ($data->toArray() as $key => $value) {
					if(!empty($value)){
						foreach ($value as $v) {		
							$insert[] = [
								'title' => $v['title'], 
								'description' => $v['description'], 
								'name' => Input::get('name')
							];
						}
					}
				}				
				if(!empty($insert)){
					item::insert($insert);
					return back()->with('success','Insert Record successfully.');
				}
			}
		}
		return back()->with('error','Please Check your file, Something is wrong there.');
	}
}
