<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use App\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Awnsered;
use App\Quiz;

class AwnseredController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:register');

    }

    public function index(){

        $page = request()->route()->getPrefix();
        $errorPage = "/gp2018/cadastro";
        $correctPage = "site.feedback";
        $sucessPage = "site.questions";

        if($page == "/semana2019") {
            $errorPage = "/semana2019/cadastro";
            $correctPage = "semana2019.feedback";
            $sucessPage = "semana2019.questions";
        }

        if($page == "/gp2019") {
            $errorPage = "/gp2019/cadastro";
            $correctPage = "site2019.feedback";
            $sucessPage = "site2019.questions";
        }

        try{
            if(Auth::check()){


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



                $search = [
                    ['quiz_id', '=', $quizActive]
                ];



                $questions = Question::where($search)->get();
                //$question = Question::find($search)->get();

                //dd($questions->count());
                //dd($question[$answeredsPosition]);

                //dd($answeredsPosition);

                if($answeredsPosition < $questions->count()){
                    //dd(true);
                    $question = $questions[$answeredsPosition];

                } else {
                    //dd(false);
                    return view($correctPage);
                }

//                if($question == null){
//
//                    return view($correctPage);
//                }
            } else {
                return redirect($errorPage);
            }
        } catch (\Exception $exception){
            $errorRegister = 'Erro 204 - Verifique se o seu navegador está com os cookies habilitados e limpe o cache do browser (ctrl+f5), Após isso faça o registro novamente - Se o erro persistir entre contato com a equipe de comunicação interna informando o código do erro.';
            return redirect($errorPage, compact('errorRegister'));
        }


        //dd($questionsCount);
        return view($sucessPage, compact('question'));

    }

    public function store(Question $question){

        //dd(request('answer'));

        $page = request()->route()->getPrefix();
        $sucessPage = "question";

        if($page == "/semana2019") {
            $sucessPage = "question_2019";
        }

        if($page == "/gp2019") {
            $sucessPage = "question_2019";
        }

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

        return redirect()->route($sucessPage);

        //return redirect('/perguntas/');

    }
}
