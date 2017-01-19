<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class salary_deduction extends Model{
    protected $table = 'salary_deductions';
	protected $fillable = ['emp_id', 'gpf_deduction', 'nps_deduction', 'festival_deduction', 'house_building_deduction',
	'car_loan_deduction', 'motor_cycle_deduction', 'group_deduction', 'salary_saving_deduction', 'professional_tax_deduction',
	'income_tax_deduction' ,'welfare_deduction', 'other_deduction', 'union_fee', 'kss', 'glsi', 'total_deduction', 'month', 'year'];
	public $timestamps = false;
}
