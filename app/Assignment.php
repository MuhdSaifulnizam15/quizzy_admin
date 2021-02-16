<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'assignments';
    
    /**
     * Get the quiz associated with the assignments
     */
    public function quizzes(){
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }

    /**
     * Get the subject associated with the assignment
     */
    public function subject(){
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the classroom associated with the assignment
     */
    public function classroom(){
        return $this->belongsTo(Classroom::class);
    }
}
