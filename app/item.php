<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    protected $fillable = ['title', 'description', 'name'];
	public $timestamps = false;
}
