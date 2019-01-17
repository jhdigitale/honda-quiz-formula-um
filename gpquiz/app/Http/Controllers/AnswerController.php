<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use App\Answer;

class AnswerController extends Controller
{
    //
    public function index(){
        $page = request()->route()->getPrefix();
        $correctPage = "site.questions";

        if($page == "/semana2019") {
            $correctPage = 'semana2019.questions';
        }

        return view($correctPage);

    }
    public function store(Question $question){

        $this->validate(request(), [
            'answer' => 'required',
            'order' => 'required',
        ]);

        $nameFile = "";

        if (request()->hasFile('image') && request()->file('image')->isValid()) {

            $name = uniqid(date('HisYmd'));
            $extension = request()->image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = request()->image->storeAs('answer', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao


            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if ( !$upload )
                return response()->json('error', 'Falha ao fazer upload');

        }

        $request = [
            'answer' => request('answer'),
            'order' => request('order'),
            'correct' => request('correct'),
            'image' => $nameFile,
            'active' => 0,
        ];


        $question->addAnswer($request);

        //$question->addAnswer(request(['answer', 'order', 'correct']));
        //return back();

        return response()->json($question);
    }




}
