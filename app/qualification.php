<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class qualification extends Model
{
    protected $table = 'qualifications';
	protected $fillable = ['qualification', 'status'];
	public $timestamps = false;
}
