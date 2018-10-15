<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quiz;
use Carbon\Carbon;

class QuizController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        //$this->middleware('auth')->except(['index']);

    }

    public function index()
    {
        //
        $quizzes = Quiz::where('active', '=', 0)->get();
        return view('admin.quiz.index', compact('quizzes'));

    }

    public function create()
    {
        return view('admin.quiz.create');
    }

    public function store()
    {
        
        $this->validate(request(), [

            'name' => 'required',
            'date_init' => 'required',
            'date_end' => 'required',
            'date_lottery' => 'required'

        ]);

        Quiz::create(request(['name', 'date_init', 'date_end', 'date_lottery']));

        return redirect('/admin');

    }


    public function show(Quiz $quiz)
    {
        return view('admin.quiz.show', compact('quiz'));
    }

    public function edit(Quiz $quiz)
    {
        //
        return view('admin.quiz.edit', compact('quiz'));

    }


    public function update(Quiz $quiz)
    {
        $this->validate(request(), [

            'name' => 'required',
            'date_init' => 'required',
            'date_end' => 'required',
            'date_lottery' => 'required'

        ]);

        $quiz->update(request(['name', 'date_init', 'date_end', 'date_lottery']));
        //Quiz::create(request(['name', 'date_init', 'date_end', 'date_lottery']));

        return redirect('/admin');
    }

    public function destroy(Quiz $quiz)
    {
        //$quiz->active = 1;
        $quiz->update(['active' => 1]);
        //$quiz = Quiz::update(['active' => 1]);

        return response()->json($quiz);


    }
}
