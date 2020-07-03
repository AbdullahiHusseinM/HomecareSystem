<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Securityprovider extends Model
{
    protected $table = 'securityproviders';

    protected $fillable = [
        'name',
        'registration_number',
        'location',
        'contact_first_name',
        'contact_last_name',
        'contact_phone_number',
        'email'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'foreign_id', 'id');
    }
}
