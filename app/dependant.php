<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dependant extends Model
{
    protected $fillable = ['emp_id', 'relation', 'first_name', 'last_name', 'dob', 'profession', 'status', 'submission_date'];
	public $timestamps = false;
}
