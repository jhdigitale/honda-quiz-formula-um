<?php

namespace App\Http\Controllers;

use App\Awnsered;
use App\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    //

    public function construct(){
        $this->middleware('guest:register');
    }


    public function create(){
        return view('site.register');
    }

    public function cockpit(){
        return view('site.cockpit');
    }

    public function login(){
        return view('site.login');
    }

    public function store(){

            $login = [
                'email' => request('email'),
                'password' => request('register'),
                'register' => request('register'),
                'cpf' => request('cpf'),
            ];

            $haveUsers = Register::where('register', '=', request('register'))->get()->count();

            if($haveUsers > 0){
                $logged = Auth::guard('register')->attempt($login);

                if ($logged) {
                    //Auth::guard('register')->loginById($login->id);
                    return redirect()->route('question');
                }

            } else {

                $this->validate(request(), [
                    'name' => 'required',
                    'email' => 'required',
                    'register' => 'required',
                    'cpf' => 'required',
                    'local' => 'required',
                ]);


                $register = [
                    'name' => request('name'),
                    'email' => request('email'),
                    'password' => bcrypt(request('register')),
                    'register' => request('register'),
                    'cpf' => request('cpf'),
                    'local' => request('local'),
                ];




                try {

                    $user = Register::create($register);
                    $logged = Auth::guard('register')->attempt($login);

                } catch (\PDOException $e) {

                    //dd($e);
                    //flash()->error('Confira os dados de sua Matricula e seu CPF');
                    //return redirect()->back();

                    return redirect()->back()->withErrors('message', 'Confira os dados de sua Matricula e seu CPF');
                }

                //Auth::guard('register')->login($user);
                //Auth::guard('register')->logout();

            }


            return redirect()->route('question');
    }

    public function storeLogin()
    {

        $logged = !auth()->attempt(request(['register', 'cpf']));

        if ($logged) {
            return back();
        }

        return redirect()->home();
    }
}
