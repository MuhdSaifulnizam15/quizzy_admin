<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    /**
     * Get the question associated with the answer
     */
    public function questionAnswer(){
        return $this->belongsTo(Question::class);
    }
}
