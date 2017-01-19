<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leavemaster extends Model
{
    protected $table = 'leave_master';
	protected $fillable = ['emp_id', 'leave_type_id', 'status'];
	public $timestamps = false;
}
