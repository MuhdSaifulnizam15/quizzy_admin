<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'questions';

    /** The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'duration', 'quiz_id', 'question_type_id', 'is_true'
    ];

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
