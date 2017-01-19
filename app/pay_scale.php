<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pay_scale extends Model
{
    protected $table = 'scale';
	protected $fillable = ['payScale_lower_limit', 'payScale_uper_limit'];
	public $timestamps = false;
}
