<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class apply_loan extends Model
{
    protected $table = 'apply_loans';
	protected $fillable = ['loan_type_id', 'emp_id', 'application', 'month', 'year', 'fld_DeptID'];
	public $timestamps = false;
}
