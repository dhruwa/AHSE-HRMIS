<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeePensionDetail extends Model
{
    protected $fillable = array('emp_id', 'bank_details', 'current_address');
	protected $table    = 'employee_pension_details';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'emp_id' 			=>  'required|exists:employees,emp_id',
    	'bank_details' 		=>  'required|max:255|unique:employee_pension_details', 
    	'current_address'  	=>  'required|max:500',
    ];

    public function employee() 
	{
		return $this->belongsTo('App\employee', 'emp_id');
	}
}
