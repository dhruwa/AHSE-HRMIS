<?php

namespace App\Http\Controllers;
use Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\appoimtment_master;

class AppointmentController extends Controller
{
    public function index(){
		return view('appointment_insert');
	}
	
	public function appointment_insert(Request, $request){
		
	}
	
	public function appointment_view(){
		
	}
}
