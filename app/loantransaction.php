<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loantransaction extends Model
{
    protected $table = 'loan_trasection';
	protected $fillable = ['emp_id', 'loan_type_id', 'loan_ammount', 'no_of_instalment', 'interest_amount', 'pricipal_ammount',
	'applied_on', 'applied_for', 'fld_DeptID', 'status'];
	public $timestamps = false;
}
