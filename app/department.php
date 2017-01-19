<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    protected $fillable = ['fld_DeptID', 'fld_Department', 'fld_Status'];
	public $timestamps = false;
}
