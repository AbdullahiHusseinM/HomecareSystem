<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = 'payments';

    protected $fillable = 
    [
        'date_paid',
        'service_offered',
        'amount_paid',
        'payment_ref_number',
        'client_name',
        'client_ref_number'
    ];
}
