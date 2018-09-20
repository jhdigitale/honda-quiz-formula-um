<?php

namespace App;
use Illuminate\Support\Facades\Auth;

class Awnsered extends Model
{
    //
    protected $fillable = [
        'quiz_id', 'question_id', 'register_id', 'user_id', 'answer',
    ];

    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    public function question(){
        return $this->belongsTo(Question::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function answered($user){
        $awnsereds = Awnsered::where('register_id', '=', $user);
        return $awnsereds;
    }


//    public function user(){
//        return $this->belongsTo(User::class);
//    }
}
