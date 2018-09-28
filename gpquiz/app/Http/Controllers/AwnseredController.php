<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Awnsered;

class AwnseredController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:register');

    }

    public function index(){

        //dd(Auth::guard('register')->user());

        try{
            if(Auth::check()){
                $awnsereds = Awnsered::where('register_id', '=', Auth::guard('register')->user()->id)->count() + 1;
                $question = Question::find($awnsereds);
                //$questionsCount = Question::where('quiz_id', '=', '1')->count();

                if($question == null){
                    return view("site.feedback");
                }
            } else {
                return redirect("/gp2018/cadastro");
            }
        } catch (\Exception $exception){
            $errorRegister = 'Erro 3 - Verifique se seu navegador estão com cookies habilitados e limpe seu cache do browser, após essa verificação faça o registro novamente';
            return redirect("/gp2018/cadastro", compact('errorRegister'));
        }



        //dd($questionsCount);
        return view("site.questions", compact('question'));

    }

    public function store(Question $question){

        //dd(request('answer'));

        $this->validate(request(), [
            'answer' => 'required',
        ]);

        $answered = [
            'quiz_id' => $question->quiz_id,
            'question_id' => $question->id,
            'register_id'=> Auth::guard('register')->user()->id,
            'user_id' => Auth::guard('register')->user()->id,
            'answer' => request('answer'),
        ];

        $resposta = Awnsered::create($answered);
        $quantidade = $resposta->answered($resposta->user_id)->count() + 1;

        return redirect()->route('question');

        //return redirect('/perguntas/');

    }
}
