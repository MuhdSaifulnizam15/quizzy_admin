<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionType extends Model
{
        /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'question_type';

    /**
     * Get the type of question associated with the question
     */
    public function questions(){
        return $this->hasMany(Question::class);
    }
}
