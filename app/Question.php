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
    public function questionAnswer(){
        return $this->hasOne(QuestionAnswer::class);
    }

    /**
     * Get the quiz associated with the question
     */
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    /**
     * Get the quiz associated with the question
     */
    public function questionType(){
        return $this->belongsTo(QuestionType::class);
    }
}
