<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pension extends Model
{
    protected $fillable = array('employee_id', 'pension_order_number', 'pension_order_date', 'pension_type', 'pension_status', 'month', 'year', 'dr', 'medical', 'pension', 'basic', 'total_pension');
	protected $table    = 'pensions';
    protected $guarded  = ['_token'];

    public static $rules = [
    	'employee_id' 			=>  'required|exists:employees,emp_id',
    	'pension_order_number' 	=>  'required|max:255', 
    	'pension_order_date'  	=>  'required|date_format:Y-m-d',
    	'pension_type'  		=>  'required|in:SP,FP',
    	'month'  				=>  'required|numeric',
    	'year'  				=>  'required|numeric',
    	'dr'  					=>  'required|numeric',
    	'medical'  				=>  'required|numeric',
    	'pension'  				=>  'required|numeric',
    	'basic'  				=>  'required|numeric',
    	'total_pension'  		=>  'required|numeric',
    ];

    public function employee() 
	{
		return $this->belongsTo('App\employee', 'emp_id');
	}
}
