<?php

namespace App\Http\Controllers;

use App\Awnsered;
use App\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\Object_;

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
        $page = request()->route()->getPrefix();
        $correctPage = 'site.register';

        if($page == "/semana2019") {
            $correctPage = 'semana2019.register';
            //return view('semana2019.register', compact('errorRegister'));
        }

        return view($correctPage, compact('errorRegister'));
    }

    public function cockpit(){

        $page = request()->route()->getPrefix();
        $correctPage = "site.cockpit";

        if($page == "/semana2019") {
            $correctPage = 'semana2019.cockpit';
            //return view('semana2019.cockpit');
        }

        return view($correctPage);
    }

    public function login(){
        $errorRegister = null;
        return view('site.login', compact('errorRegister'));
    }

    public function store(){
            $page = request()->route()->getPrefix();

            $correctPage = 'site.register';
            $succesPage = "question";

            if($page == "/semana2019") {
                $correctPage = 'semana2019.register';
                $succesPage = 'question_2019';
            }


            $login = [
                'email' => request('email'),
                'password' => request('register'),
                'register' => request('register'),
                'cpf' => request('cpf'),
            ];

            $haveUsers = Register::where('register', '=', request('register'))->get()->count();

            //dd(Register::where('register', '=', request('register'))->get());

            if($haveUsers > 0){

                try {
                    $logged = Auth::guard('register')->attempt($login);

                    if ($logged) {
                        //Auth::guard('register')->loginById($login->id);
                        return redirect()->route($succesPage);
                    } else {
                        //Auth::guard('register')->loginById($login->id);
                        $errorRegister = 'Não foi possível identificar seu usuário, por favor verifique os dados preenchidos';
                        return view($correctPage, compact('errorRegister'));
                    }
                } catch (\Exception $exception){
                    $errorRegister = 'Erro 201 - Verifique se o seu navegador está com os cookies habilitados e limpe o cache do browser (ctrl+f5), Após isso faça o registro novamente - Se o erro persistir entre contato com a equipe de comunicação interna informando o código do erro.';
                    return view($correctPage, compact('errorRegister'));

                }

            } else {

                $this->validate(request(), [
                    'name' => 'required',
                    'email' => 'required',
                    'register' => 'required',
                    'cpf' => 'required',
                    'local' => 'required',
                    'quiz' => 'required',
                ]);


                $register = [
                    'name' => request('name'),
                    'email' => request('email'),
                    'password' => bcrypt(request('register')),
                    'register' => request('register'),
                    'cpf' => request('cpf'),
                    'local' => request('local'),
                    'quiz' => request('quiz'),
                ];

                try {

                    $user = Register::create($register);

                    $logged = Auth::guard('register')->attempt($login);

                    if (!$logged) {
                        //Auth::guard('register')->loginById($login->id);
                        $errorRegister = 'Erro 202 - Verifique se o seu navegador está com os cookies habilitados e limpe o cache do browser (ctrl+f5), Após isso faça o registro novamente - Se o erro persistir entre contato com a equipe de comunicação interna informando o código do erro.';
                        return view($correctPage, compact('errorRegister'));
                    }

                } catch (\PDOException $e) {

                    $errorRegister = 'Você já possui um registro, verifique se os dados estão corretos.';
                    return view($correctPage, compact('errorRegister'));

                }

            }

            return redirect()->route($succesPage);
    }

    public function storeLogin()
    {

        $login = [
            //'email' => request('email'),
            'password' => request('register'),
            'register' => request('register'),
            'cpf' => request('cpf'),
        ];

        try {
            $logged = Auth::guard('register')->attempt($login);

            if ($logged) {
                //Auth::guard('register')->loginById($login->id);
                return redirect('/gp2018/fim');
            } else {
                //Auth::guard('register')->loginById($login->id);
                $errorRegister = 'Não foi possível identificar seu usuário, por favor verifique os dados preenchidos';
                return view('site.login', compact('errorRegister'));
            }
        } catch (\Exception $exception){
            $errorRegister = 'Erro 211 - Verifique se o seu navegador está com os cookies habilitados e limpe o cache do browser (ctrl+f5), Após isso faça o registro novamente - Se o erro persistir entre contato com a equipe de comunicação interna informando o código do erro.';
            return view('site.login', compact('errorRegister'));

        }

        //return redirect()->gabaritoCorrigido();


        //return view('site.finish', compact('register'));
        return redirect('/gp2018/fim');
    }

    public function finish(){

        $winners["gahadores"] = Register::where('winner', '=', 1)->orderBy('name','ASC')->get();
        $winners["kit"] = Register::where('kit', '=', 1)->orderBy('name','ASC')->get();

        // $plantas = Register::select('local')->distinct()->get();
        // $locais = collect();

        // foreach ($plantas as $planta){

        //     $plantaNome = $planta->local;
        //     $plantaUsuariosWin = Register::where('local', '=', $plantaNome)->where('winner', '=', 1)->get();
        //     $plantaUsuariosKit = Register::where('local', '=', $plantaNome)->where('kit', '=', 1)->get();

        //     $plantaFinal['planta'] = $plantaNome;
        //     $plantaFinal['usuariosWin'] = $plantaUsuariosWin;
        //     $plantaFinal['usuariosKit'] = $plantaUsuariosKit;

        //     $locais->push($plantaFinal);


        // }

        // //dd($locais);

        return view('site.encerrado', compact('winners'));
    }
}
