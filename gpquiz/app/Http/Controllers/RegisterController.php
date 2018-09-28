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


    public function home(){
//        $errorRegister = null;
        return redirect("/gp2018");
    }

    public function create(){
        $errorRegister = null;
        return view('site.register', compact('errorRegister'));
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

                try {
                    $logged = Auth::guard('register')->attempt($login);

                    if ($logged) {
                        //Auth::guard('register')->loginById($login->id);
                        return redirect()->route('question');
                    } else {
                        //Auth::guard('register')->loginById($login->id);
                        $errorRegister = 'Não foi possível identificar seu usuário, por favor verifique os dados preenchidos';
                        return view('site.register', compact('errorRegister'));
                    }
                } catch (\Exception $exception){
                    $errorRegister = 'Erro 201 - Verifique se o seu navegador está com os cookies habilitados e limpe o cache do browser (ctrl+f5), Após isso faça o registro novamente - Se o erro persistir entre contato com a equipe de comunicação interna informando o código do erro.';
                    return view('site.register', compact('errorRegister'));

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

                    if (!$logged) {
                        //Auth::guard('register')->loginById($login->id);
                        $errorRegister = 'Erro 202 - Verifique se o seu navegador está com os cookies habilitados e limpe o cache do browser (ctrl+f5), Após isso faça o registro novamente - Se o erro persistir entre contato com a equipe de comunicação interna informando o código do erro.';
                        return view('site.register', compact('errorRegister'));
                    }

                } catch (\PDOException $e) {

                    $errorRegister = 'Erro 203 - Verifique se o seu navegador está com os cookies habilitados e limpe o cache do browser (ctrl+f5), Após isso faça o registro novamente - Se o erro persistir entre contato com a equipe de comunicação interna informando o código do erro.';
                    return view('site.register', compact('errorRegister'));

                }

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
