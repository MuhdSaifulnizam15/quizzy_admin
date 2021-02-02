<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * Get the options associated with the question
     */
    public function questionOptions(){
        return $this->hasMany(QuestionOption::class);
    }

    /**
     * Get the answer associated with the question.
     */
    public function questionAnswers(){
        return $this->hasOne(QuestionAnswer::class);
    }
}
