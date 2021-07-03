<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExamType extends Model
{
    protected $fillable = [
        'description',
        'normal_values',
        'choices',
        'type'
    ];
}
