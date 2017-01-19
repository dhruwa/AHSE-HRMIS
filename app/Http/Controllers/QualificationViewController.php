<?php

namespace App\Http\Controllers;

use App\qualification;
use App\Http\Requests;
use Illuminate\Http\Request;

class QualificationViewController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $qualifications = qualification::all();
        return view('qualificationview', compact('qualifications'));
    }    
}
