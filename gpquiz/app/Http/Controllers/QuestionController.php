<?php

namespace App\Http\Controllers;

use App\Question;
use App\Quiz;

class QuestionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth')->except(['index']);

    }

    //
    public function index(Quiz $quiz)
    {
        //
        $questions = Question::where([
            ['quiz_id', '=', $quiz->id],
            ['active', '<>', 1],

        ])->get();

        return view('admin.question.index', compact('questions'));

    }

    //
    public function list(Quiz $quiz)
    {

        return view('admin.question.index', compact('quiz'));

    }

    public function create(Quiz $quiz)
    {
        return view('admin.question.create', compact('quiz'));
    }

    public function edit(Quiz $quiz, Question $question)
    {
        //dd($quiz);
        //dd($question);
        return view('admin.question.edit', ['quiz' => $quiz, 'question' => $question]);
    }

    public function store(Quiz $quiz)
    {

        $this->validate(request(), [
            'question' => 'required',
        ]);

        $nameFile = "";
        if (request()->hasFile('image') && request()->file('image')->isValid()) {

            $name = uniqid(date('HisYmd'));
            $extension = request()->image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = request()->image->storeAs('question', $nameFile);

            if ( !$upload )
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
        }

        $requestQuestion = [
            'quiz_id' => $quiz->id,
            'question' => request('question'),
            'order' => 0,
            'image' => $nameFile,
            'answer' => request('answer'),
            'active' => 0,
        ];

        $question = Question::create($requestQuestion)->id;
        return redirect()->route('edit-question', [$quiz, $question]);

    }


    public function update(Quiz $quiz, Question $question)
    {

        $this->validate(request(), [
            'question' => 'required',
        ]);

        $nameFile = "";
        if (request()->hasFile('image') && request()->file('image')->isValid()) {

            $name = uniqid(date('HisYmd'));
            $extension = request()->image->extension();
            $nameFile = "{$name}.{$extension}";
            $upload = request()->image->storeAs('question', $nameFile);

            if ( !$upload )
                return redirect()
                    ->back()
                    ->with('error', 'Falha ao fazer upload')
                    ->withInput();
        }

        $requestQuestion = [
            'quiz_id' => $quiz->id,
            'question' => request('question'),
            'order' => 0,
            'image' => $nameFile,
            'answer' => request('answer'),
            'active' => 0,
        ];

        $question = $question->update($requestQuestion);

        dd($requestQuestion);

        return back();

        
//        $this->validate(request(), [
//
//            'name' => 'required',
//            'date_init' => 'required',
//            'date_end' => 'required',
//            'date_lottery' => 'required'
//
//        ]);
//
//        $quiz->update(request(['name', 'date_init', 'date_end', 'date_lottery']));
//


        //Quiz::create(request(['name', 'date_init', 'date_end', 'date_lottery']));

        //return redirect('/admin');
    }

    public function orderUpdate(Quiz $quiz)
    {
        dd(request());
        dd($quiz);
    }


    public function destroy(Quiz $quiz, Question $question)
    {
        //dd($question);
        $question->update(['active' => 1]);

        return response()->json($question);
    }


    public function show(Question $question)
    {
        return view('admin.question.show', compact('question'));
    }
}
