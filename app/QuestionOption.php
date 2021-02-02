<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionOption extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question_options';

    /**
     * Get the question associated with the options
     */
    public function question(){
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the answer associated with the option
     */
    public function questionAswer(){
        return $this->hasOne(QuestionAnswer::class);
    }
}
