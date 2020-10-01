<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageExam extends Model
{
    protected $fillable = [
        'user_id',
        'package_id',
        'exam_id'
    ];
}
