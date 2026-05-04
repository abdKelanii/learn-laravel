<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class RegisterUserController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        dd('create new user and log them in');
    }
}
