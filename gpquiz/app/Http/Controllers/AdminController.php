<?php

namespace App\Http\Controllers;

use App\User;

class AdminController extends Controller
{

    public function create(){
        return view('admin.auth.register');
    }

    public function login(){
        return view('admin.auth.login');
    }

    public function store(){

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed',

        ]);

        $register = [
            'name' => request('name'),
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ];

        $user = User::create($register);
        auth()->login($user);
        return redirect()->home();
    }
}
