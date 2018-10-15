<?php

namespace App\Http\Controllers;

use App\Awnsered;
use Illuminate\Http\Request;
use App\Register;
use App\Question;
use Barryvdh\DomPDF\Facade as PDF;


class WinnerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth')->except(['index']);

    }

    public function index(){

        //$registers = Awnsered::where('quiz_id', '=', '1')->distinct('register_id');
        $registersInit = Register::all();
        //dd($registers);
        $registers = collect(new Register);


        foreach ($registersInit as $register){

            $register->correct = WinnerController::getCorrect($register);

            //dd($register);
            $registers->push($register);
            //getCorrect($registers);
        }


        return view('admin.winners.index', compact('registers'));

    }

    public function edit(Register $register){
        return view('admin.winners.edit', compact('register'));
    }



    public function update(Register $register)
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required',
            'register' => 'required',
            'cpf' => 'required',
            'local' => 'required',
        ]);

        $registerRequest = [
            'name' => request('name'),
            'email' => request('email'),
            'register' => request('register'),
            'cpf' => request('cpf'),
            'local' => request('local'),
            'password' => bcrypt(request('password')),
        ];

        $register->update($registerRequest);

        return redirect('/admin/winners');
    }

    public function win()
    {

        $register = Register::find(request('user'));
        $win = request('win') == 'true' ? 1: 0;
        $register->winner = $win;

        dd($register->update());

    }

    public function kit()
    {

        $register = Register::find(request('user'));
        $kit = request('kit') == 'true' ? 1: 0;
        $register->kit = $kit;

        dd($register->update());

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

                if(count($respostasUsuarios) > 0 && $posicaoQuestao < (count($respostasUsuarios) - 1)){

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

    public function generatePDF(Register $register){

        //$user = Auth::guard('register')->user();
        $questions = Question::where('quiz_id', '=', 1)->get();
        $userAnswered = Awnsered::where('register_id', '=', $register->id)->get();

        $data['user'] = $register;
        $data['questions'] = collect(new Question);
        $data['answers'] = $userAnswered;

        $i = 0;

        foreach ($questions as $question){
            $reposta = $userAnswered[$i]->answer;
            $question->reposta = $reposta;
            $data['questions']->push($question);
            $i++;
        }

        return PDF::loadView('admin.winners.gabarito', compact('data'))
            ->stream();

    }

    public function generatePDFCorrigido(Register $register){

        //$user = Auth::guard('register')->user();
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

        return PDF::loadView('admin.winners.gabarito', compact('data'))
            ->stream();

    }

    public function destroy(Register $register)
    {
        $register->delete();

        return response()->json($register);
    }

}
