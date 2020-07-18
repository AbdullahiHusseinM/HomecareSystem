<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CaregiverProfile extends Model
{
    protected $table = 'caregiver_profiles';


    protected $fillable = [
        'caregiver_id',
        'education',
        'passport_photo',
        'experience',
        'date_of_birth',
        'license_number',
        'license_certificate'
    ];


    public function caregiver()
    {
        return $this -> belongsTo('App\Caregiver');
    }
}
