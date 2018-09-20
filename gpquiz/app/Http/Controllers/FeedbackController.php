<?php

namespace App\Http\Controllers;

use App\Awnsered;
use App\Question;
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

    public function congratualtions(){
        return view('site.congratulation');
    }

}
