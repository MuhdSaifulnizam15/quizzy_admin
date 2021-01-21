<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Get the subject that owns the classroom.
     */
    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
