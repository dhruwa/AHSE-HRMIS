<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salary_claims extends Model{
	protected $table = 'salary_claims';
	protected $fillable = ['emp_id', 'basic_pay', 'dearness_allowance', 'hra', 'medical_allowance', 'conveyance_allowance',
	'city_allowance', 'others', 'gross_salary', 'month', 'year'];
	public $timestamps = false;
}
