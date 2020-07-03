<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caregiver extends Model
{
    protected $table = 'caregivers';

    protected $fillable = 
    [
        'first_name',
        'last_name',
        'surname',
        'gender',
        'email',
        'identification_number',
        'phone_number',
        'job_title',
        'physical_location'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'foreign_id', 'id');
    }
}
