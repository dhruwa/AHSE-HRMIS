<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;

class CreateController extends Controller
{
    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'd_name' => 'required',
            'd_place' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'd_name' => $data['d_name'],
            'd_place' => $data['d_place'],
        ]);
    }
}
