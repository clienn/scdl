<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'cashiering_transaction_id',
        'exam_result'
    ];
}
