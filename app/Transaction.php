<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    const PAYMENT_COMPLETED = 1;
    const PAYMENT_PENDING = 0;

    protected $fillable = [
        'transaction_id', 
        'amount', 
        'payment_status',
        'appoinmentNumber'
    ];
}
