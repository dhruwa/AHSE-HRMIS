<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class member extends Model{
	protected $table = 'users';
    protected $fillable = ['firstname', 'middlename', 'lastname', 'email', 'password', 'role', 'status', 'image'];
	protected $hidden = ['password', 'remember_token',];
}
