<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class parameter extends Model
{
	protected $fillable = ['parameter_type'];
	public $timestamps = false;
}
