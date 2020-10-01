<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = [
        'name',
        'address',
        'contact_person',
        'tin',
        'fax',
        'contact',
        'status'
    ];
}
