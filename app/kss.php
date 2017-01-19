<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kss extends Model
{
    protected $table = 'kss';
	protected $fillable = ['emp_id', 'loan_amount', 'interest', 'subscrptn', 'recovery', 'total', 'month', 'year', 'status'];
	public $timestamps = false;
}
