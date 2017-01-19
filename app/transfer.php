<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transfer extends Model
{
	protected $table = 'transfer';
    protected $fillable = ['emp_id', 'current_dept_id', 'new_dept_id', 'submission_date'];
	public $timestamps = false;
}
