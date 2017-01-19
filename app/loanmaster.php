<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class loanmaster extends Model
{
    protected $table = 'employee_loan';
	protected $fillable = ['emp_id', 'loan_type_id', 'loan_ammount', 'status'];
	public $timestamps = false;
}
