<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pharmacy extends Model
{
    protected $table = 'pharmacies';

    protected $fillable = [
        'name',
        'license_number',
        'location',
        'contact_surname',
        'contact_first_name',
        'contact_last_name',
        'contact_phone_number',
        'email',
        'password'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'foreign_id', 'id');
    }
}
