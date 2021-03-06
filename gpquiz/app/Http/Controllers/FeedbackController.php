<?php

namespace App\Http\Controllers;

use App\Awnsered;
use App\Question;
use App\Register;
use App\Quiz;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
{
    //
//    private $model;
//    public function __construct(Stackoverflow $model)
//    {
//        $this->model = $model;
//    }

    public function index()
    {
        //$data['model'] = $this->model->all();

        $page = request()->route()->getPrefix();

        //$correctPage = 'site.gabarito';
        $succesPage = "site.gabarito";

        if($page == "/semana2019") {
            //$correctPage = 'semana2019.register';
            $succesPage = "semana2019.gabarito";
        }

        if($page == "/gp2019") {
            //$correctPage = 'semana2019.register';
            $succesPage = "site2019.gabarito";
        }


        $user = Auth::guard('register')->user();

        $now = date('Y-m-d');

        $quiz = Quiz::where('date_init', '<=', $now)
            ->where('date_end', '>=', $now)
            ->get();


        $quizActive = $quiz->first()->id;

        $questions = Question::where('quiz_id', '=', $quizActive)->get();

        if(!$user){
            $errorRegister = 'Não foi possível identificar seu usuário, por favor verifique os dados preenchidos';
            redirect()->route($sucessPage);
        }

        $userAnswered = Awnsered::where('register_id', '=', $user->id)
            ->where('quiz_id', '>=', $quiz)
            ->get();


        $data['user'] = $user;
        $data['questions'] = collect(new Question);
        $data['answers'] = $userAnswered;

        $i = 0;

        foreach ($questions as $question){
            $reposta = $userAnswered[$i]->answer;
            $question->reposta = $reposta;
            $data['questions']->push($question);
            $i++;
        }
        
        return PDF::loadView($succesPage, compact('data'))
            ->stream();
    }


    public function gabaritoCorreto(){

        $register = Auth::guard('register')->user();
        $questions = Question::where('quiz_id', '=', 3)->get();
        $userAnswered = Awnsered::where('register_id', '=', $register->id)->get();

        $data['user'] = $register;
        $data['questions'] = collect(new Question);
        $data['answers'] = $userAnswered;

        $i = 0;

        $posicaoResposta = 0;
        $respostasUsuarios = $register->answeredByUser($register);


        foreach ($questions as $question){


            foreach ($question->answersToCorrect($question) as $answer) {

                $respostilha = $respostasUsuarios[$posicaoResposta];
                $answer->correta = 0;

                if($answer->correct == $respostilha->answer){
                    $answer->correta = 1;

                    //$question->correta = 1;
                }

                $reposta = $userAnswered[$i]->answer;
                $question->reposta = $reposta;

            }


            $data['questions']->push($question);
            $posicaoResposta++;

            $i++;
        }

        return PDF::loadView('site2019.gabarito-final', compact('data'))
            ->stream();

    }

    public function finish(){
        $register = Auth::guard('register')->user();
        $register = Register::find($register->id);
        $register->correct = FeedbackController::getCorrect($register);

        return view('site2019.finish', compact('register'));

        //return view('site.finish', compact('register'));
    }

    public function congratualtions(){

        $page = request()->route()->getPrefix();
        $sucessPage = "site.congratulation";

        if($page == "/semana2019") {
            $sucessPage = "semana2019.congratulation";
        }

        if($page == "/gp2019") {
            $sucessPage = "site2019.congratulation";
        }

        return view($sucessPage);
    }

    public function comingsoon(){

        $page = request()->route()->getPrefix();
        $sucessPage = "site.embreve";

        if($page == "/semana2019") {
            $sucessPage = "semana2019.embreve";
        }

        if($page == "/site2019") {
            $sucessPage = "site2019.embreve";
        }


        if($page == "/gp2019") {
            $sucessPage = "site2019.embreve";
        }

        return view($sucessPage);
    }

    public function getCorrect(Register $register){

        // TROCAR ID TODAS AS VEZES?
        
        $questions = Question::where('quiz_id', '=', 3)->get();
        $userAnswered = Awnsered::where('register_id', '=', $register->id)->get();

        $data['user'] = $register;
        $data['questions'] = collect(new Question);
        $data['answered'] = $userAnswered;

        $i = 0;

        $respostaFinal = 0;
        $respostasUsuarios = $register->answeredByUser($register);
        $posicaoQuestao = 0;

        foreach ($questions as $question){

            $posicaoResposta = 1;

            foreach ($question->answersToCorrect($question) as $answer){

                if(count($respostasUsuarios) > 0 && ($posicaoQuestao) < count($respostasUsuarios)){
                    $respostilha = $respostasUsuarios[$posicaoQuestao];

                    if($answer->correct == 1){


                        if($respostilha->answer == $posicaoResposta){

                            $respostaFinal++;
                        }
                    }

                    $posicaoResposta++;
                }
            }


            $posicaoQuestao++;

        }

        return $respostaFinal;


    }


}
