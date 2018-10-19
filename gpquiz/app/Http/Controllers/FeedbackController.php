<?php

namespace App\Http\Controllers;

use App\Awnsered;
use App\Question;
use App\Register;
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

        $user = Auth::guard('register')->user();
        $questions = Question::where('quiz_id', '=', 1)->get();
        $userAnswered = Awnsered::where('register_id', '=', $user->id)->get();

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
        
        return PDF::loadView('site.gabarito', compact('data'))
            ->stream();
    }


    public function gabaritoCorreto(){

        $register = Auth::guard('register')->user();
        $questions = Question::where('quiz_id', '=', 1)->get();
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

        return PDF::loadView('site.gabarito-final', compact('data'))
            ->stream();

    }

    public function finish(){
        $register = Auth::guard('register')->user();
        $register = Register::find($register->id);
        $register->correct = FeedbackController::getCorrect($register);

        return view('site.finish', compact('register'));
    }

    public function congratualtions(){
        return view('site.congratulation');
    }

    public function comingsoon(){
        return view('site.embreve');
    }

    public function getCorrect(Register $register){


        $questions = Question::where('quiz_id', '=', 1)->get();
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
