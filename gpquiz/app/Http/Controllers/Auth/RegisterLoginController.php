<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterLoginController extends Controller
{
    //
    public function showLoginForm(){
        return view('site.register');
    }
}
