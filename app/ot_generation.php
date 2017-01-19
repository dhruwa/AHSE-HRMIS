<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_generation extends Model
{
    protected $table = 'ot_genneration';
	protected $fillable = ['emp_id', 'working_days', 'ot_hours', 'amount', 'month', 'year'];
	public $timestamps = false;
}
