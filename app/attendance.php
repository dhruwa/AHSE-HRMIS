<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attendance extends Model
{
    protected $fillable = ['emp_name', 'in_time', 'out_time', 'date', 'month', 'year'];
	public $timestamps = false;
}
