<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizMark extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quiz_marks';
    /**
     * Get the quiz associated with the marks
     */
    public function quiz(){
        return $this->belongsTo(Quiz::class);
    }

    /**
     * Get the quiz associated with the marks
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
