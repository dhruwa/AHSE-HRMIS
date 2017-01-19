<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class promotion extends Model
{
    protected $fillable = ['emp_id', 'current_post_id', 'new_post_id', 'scale', 'grade_pay', 'submission_date'];
	public $timestamps = false;
}
