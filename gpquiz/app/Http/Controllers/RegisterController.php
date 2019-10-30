<?php

namespace App\Http\Controllers;

use App\Awnsered;
use App\Register;
use App\Quiz;
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
        return redirect("/gp2019");
    }

    public function create(){
        $errorRegister = null;
        $page = request()->route()->getPrefix();
        $correctPage = 'site.register';

        if($page == "/semana2019") {
            $correctPage = 'semana2019.register';
            //return view('semana2019.register', compact('errorRegister'));
        }

        if($page == "/gp2019") {
            $correctPage = 'site2019.register';
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
        } else if($page == "/gp2019"){
            $correctPage = 'site2019.cockpit';
        }

        return view($correctPage);
    }

    public function login(){
        $errorRegister = null;

        return view('site2019.login', compact('errorRegister'));

        //return view('semana2010.login', compact('errorRegister'));
    }

    public function store(){
            $page = request()->route()->getPrefix();

            $correctPage = 'site.register';
            $succesPage = "question";

            if($page == "/semana2019") {
                $correctPage = 'semana2019.register';
                $succesPage = 'question_2019';
            }

            if($page == "/gp2019") {
                $correctPage = 'site2019.register';
                $succesPage = 'question_2019';
            }


            $login = [
                'email' => request('email'),
                'password' => request('register'),
                'register' => request('register'),
                'cpf' => request('cpf'),
            ];

            

            $haveUsers = Register::where('register', '=', request('register'))->get()->count();

            //dd($haveUsers);
            //dd(Register::where('register', '=', request('register'))->get());

            if($haveUsers > 0){

                //$errorRegister = 'Sua participação já foi registrada em nosso sistema. Obrigado.';
                //return view($correctPage, compact('errorRegister'));

                // Travei o cara no p´roximo login.
                try {
                    //dd(Auth::guard('register')->attempt($login));

                    $logged = Auth::guard('register')->attempt($login);
                        
                    
                    //dd($logged);

                    if ($logged) {

                        //dd(Auth::guard('register')->register());

                        $now = date('Y-m-d');

                        $quiz = Quiz::where('date_init', '<=', $now)
                            ->where('date_end', '>=', $now)
                            ->get();


                        $quizActive = $quiz->first()->id;
                        $search = [
                            ['quiz_id', '=', $quizActive],
                            ['register_id', '=', Auth::guard('register')->user()->id]
                        ];
                        $answeredsPosition = Awnsered::where($search)->get()->count();

                        if($answeredsPosition > 0){
                            $errorRegister = 'Sua participação já foi registrada em nosso sistema. Obrigado.';
                            return view($correctPage, compact('errorRegister'));

                        }

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

                
                //dd(request());

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
                return redirect('/gp2019/fim');
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
        return redirect('/gp2019/fim');
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

        return view('site2019.encerrado', compact('winners'));
    }

    public function finishSemana(){

        $winners["semana_1"] = Register::where('semana_1', '=', 1)->orderBy('name','ASC')->get();
        $winners["semana_2"] = Register::where('semana_2', '=', 1)->orderBy('name','ASC')->get();
        $winners["semana_3"] = Register::where('semana_3', '=', 1)->orderBy('name','ASC')->get();
        $winners["semana_4"] = Register::where('semana_4', '=', 1)->orderBy('name','ASC')->get();

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

        return view('semana2019.encerrado', compact('winners'));
    }
}
