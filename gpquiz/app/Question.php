<?php

namespace App;

class Question extends Model
{
    //
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function answers(){
        return $this->hasMany(Answer::class);
    }


    public function answersToCorrect(Question $question){
        return Answer::where(
            'question_id', '=', $question->id
            )->where('active', '<>', 1)->get();
    }


    public function addAnswer($request){
        $this->answers()->create($request);

    }

}
