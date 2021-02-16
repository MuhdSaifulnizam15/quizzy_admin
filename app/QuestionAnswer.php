<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question_answers';

    /**
     * Get the question associated with the answer
     */
    public function question(){
        return $this->belongsTo(Question::class);
    }

    /**
     * Get the question option associated with the answer
     */
    public function questionOption(){
        return $this->belongsTo(QuestionOption::class);
    }
}
