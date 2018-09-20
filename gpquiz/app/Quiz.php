<?php

namespace App;
use App\Questions;

class Quiz extends Model
{
    public static function active(){

    	return static::where('active', 0)->get();

    }

    public function questions(){

        return $this->hasMany(Question::class);

    }
}
