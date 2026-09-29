<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
        protected $fillable = [
        'question',
        'type',
        'answer_a',
        'answer_b',
        'answer_c',
        'correct_answer',
        'points',
        'feedback',
    ];
}
