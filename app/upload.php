<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class upload extends Model
{
    protected $fillable = ['demo', 'img'];
	public $timestamps = false;
}
