<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leave_add extends Model
{
    protected $table = 'leave_balance';
	protected $fillable = ['emp_id', 'leave_type_id', 'no_of_days', 'balance'];
	public $timestamps = false;
}
