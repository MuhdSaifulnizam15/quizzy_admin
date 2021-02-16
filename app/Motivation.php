<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Motivation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'motivation_quotes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quote', 'author'
    ];
}
