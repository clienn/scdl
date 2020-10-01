<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyPackage extends Model
{
    protected $fillable = [
        'user_id',
        'company_id',
        'package_id'
    ];
}
