<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    /**
     * Get the question associated with the options
     */
    public function questionOption(){
        return $this->belongsTo(Question::class);
    }
}
