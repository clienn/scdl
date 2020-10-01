<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CashieringTransaction extends Model
{
    protected $fillable = [
        'patient_id',
        'number',
        'code',
        'exams',
        'packages',
        'remarks',
        'discount',
        'discount_type',
        'payment_method',
        'sales_invoice',
        'total',
        'amount_due',
        'tendered',
        'change_due',
        'created_at',
        'updated_at'
    ];
}
