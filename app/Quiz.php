<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'quizzes';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    /**
     * The assignments that belong to the quiz subject.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the question associated with the quiz
     */
    public function questions(){
        return $this->hasMany(Question::class);
    }

    /**
     * Get the assignments associated with the quiz
     */
    public function assignment(){
        return $this->hasMany(Assignment::class);
    }

    /**
     * Get the quiz marks associated with the quiz.
     */
    public function mark(){
        return $this->hasOne(QuizMark::class);
    }
}
