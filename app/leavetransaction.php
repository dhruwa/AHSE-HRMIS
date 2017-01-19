<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class leavetransaction extends Model
{
    protected $table = 'leave_transaction';
	protected $fillable = ['emp_id', 'fld_DeptID', 'leave_type_id', 'from_date', 'to_date', 'no_of_day', 'reason', 'applied_on', 'applied_by', 'applied_for', 'status'];
	public $timestamps = false;
}
