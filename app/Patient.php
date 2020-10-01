<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'lastname', 
        'firstname', 
        'middlename',
        'company_id',
        'birthdate',
        'gender',
        'address1',
        'address2',
        'city',
        'zipcode',
        'marital_status',
        'ethnicity',
        'type',
        'sticks_per_day',
        'alcohol_rate',
        'email',
        'phone',
        'mobile',
        'fax',
        'sss',
        'philhealth',
        'hmo',
        'hmo_no',
        'membership_date',
        'expiration_date',
        'status'
    ];

}
