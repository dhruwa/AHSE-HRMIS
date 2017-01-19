<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParameterValue extends Model
{
    protected $table = 'parameter_values';
	protected $fillable = ['parameter_id', 'value', 'effective_from', 'effective_to', 'status'];
	public $timestamps = false;
}
