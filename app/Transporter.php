<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transporter extends Model
{
    protected $table = 'transporters';

    protected $fillable =
    [
        'first_name',
        'last_name',
        'surname',
        'identification_number',
        'location',
        'email',
        'password',
        
        
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'foreign_id', 'id');
    }

    public function transporter_profile()
    {
        return $this->hasOne('App\TransporterProfile');
    }
}
