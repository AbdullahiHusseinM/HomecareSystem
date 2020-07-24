<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $table = 'invoices';

    protected $fillable = 
    [
        'date',
        'service_offered',
        'date_time_service_offered',
        'client_name',
        'status',
        'amount'
    ];


}
