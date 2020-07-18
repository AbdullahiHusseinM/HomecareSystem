<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransporterProfile extends Model
{
    protected $table = 'transporter_profiles';


    protected $fillable = [
        'transporter_id',
        'drivers_license',
        'identification_card',
        'phone_number',
        'mode_of_transport',
        'passport_photo',
        'date_of_birth',
        'model_mode_of_transport',
        'years_of_experience'
    ];


    public function transporter()
    {
        return $this -> belongsTo('App\Transporter');
    }
}
