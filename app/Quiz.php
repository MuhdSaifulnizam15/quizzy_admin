<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
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
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'assignments');
    }
}
