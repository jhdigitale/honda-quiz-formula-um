<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    //

    public function construct(){
        $this->middleware('guest');
    }

    public function index(){
        return view('admin.auth.login');
    }


    public function store(){

        $logged = !auth()->attempt(request(['email', 'password']));

        if($logged){
            return back();
        }

        return redirect('/admin');

    }

    public function destroy(){

        auth()->logout();

        return redirect('/admin');
        //return redirect()->home();
    }

}
