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


    public function getCorrect(Register $register){

        //$user = Auth::guard('register')->user();
        $questions = Question::where('quiz_id', '=', 1)->get();
        $userAnswered = Awnsered::where('register_id', '=', $register->id)->get();

        $data['questions'] = collect(new Question);
        $data['user'] = $register;
        $data['answers'] = $userAnswered;

        $posicaoResposta = 0;
        $respostasUsuarios = $register->answeredByUser($register);
        $respostaFinal = 0;

        foreach ($questions as $question){

            foreach ($question->answersToCorrect($question) as $answer){

                $respostilha = $respostasUsuarios[$posicaoResposta];

                if($answer->correct == $respostilha->answer){
                    $respostaFinal++;
                }
            }
            $posicaoResposta++;
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

            //dd($question);

            //$question->correta = $reposta;
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
