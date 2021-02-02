<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'code',
    ];

    /**
     * The assignments that belong to the quiz subject.
     */
    public function quizzes()
    {
        return $this->belongsToMany(Quiz::class, 'assignments');
    }

    /**
     * Get the classrooms for the subject.
     */
    public function classrooms()
    {
        return $this->hasMany(Classroom::class);
    }

    /**
     * Get the assignments for the subject.
     */
    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }
}
