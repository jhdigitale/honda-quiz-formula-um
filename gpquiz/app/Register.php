<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Register extends Authenticatable
{
    protected $guarded  = 'register';

    protected $fillable = [
        'name', 'email', 'register', 'cpf', 'local', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password','remember_token',
    ];

    public function answered($user){
        $awnsereds = Awnsered::where('register_id', '=', $user);
        return $awnsereds;
    }

    public function answeredByUser($user){
        $awnsereds = Awnsered::where('register_id', '=', $user->id)->get();
        return $awnsereds;
    }

    public function questions(){
        $questions = Question::where('quiz_id', '=', 1);
        return $questions;
    }



//    $questions = Question::where('quiz_id', '=', 1);
//    $userAnswered = Awnsered::where('register_id', '=', $user->id);


}
