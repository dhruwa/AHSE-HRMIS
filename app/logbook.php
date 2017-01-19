<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class logbook extends Model
{
    public $table = 'log_books';
	protected $fillable = ['id', 'date', 'action', 'role', 'table_name'];
	public $timestamps = false;
}
