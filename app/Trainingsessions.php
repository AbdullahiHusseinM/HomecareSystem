<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trainingsessions extends Model
{
    protected $table = 'trainingsessions';

    protected $fillable = 
    [
        'name',
        'date_from',
        'date_to',
        'time_from',
        'time_to',
        'venue',
        'training_facilitator'
    ];


    
}
