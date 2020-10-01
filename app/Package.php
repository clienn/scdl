<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
        'discount',
        'discount_type'
    ];
}
