<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class demo extends Model
{
    //protected $table = 'qualification';
	//protected $fillable = ['qualification', 'status'];
	protected $table = 'demos';
	protected $fillable = ['qualification'];
	public $timestamps = false;
}
