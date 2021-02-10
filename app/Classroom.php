<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'classrooms';

    /** The attributes that are mass assignable.
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

    /**
     * Get the tutor that owns the classroom.
     */
    public function tutor()
    {
        return $this->belongsTo(User::class);
    }
}
