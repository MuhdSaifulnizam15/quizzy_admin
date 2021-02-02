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
        return $this->hasMany(Quiz::class);
    }

    /**
     * Get the subject associated with the assignment
     */
    public function subejct(){
        return $this->belongsTo(Subject::class);
    }
}
