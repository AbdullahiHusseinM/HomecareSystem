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
        'license_certificate',
        'name_of_institution',
        'acquired_qualification',
        'qualification_start_date',
        'qualification_end_date',
        'copy_of_certificate',
        'name_of_organization',
        'organization_unit',
        'organization_job_title',
        'organization_start_date',
        'organization_end_date',
        'radius_of_operation'
    ];


    public function caregiver()
    {
        return $this -> belongsTo('App\Caregiver');
    }

    public function checkFields()
    {
        $result = false;

        collect($this->fillable)->each(function($field) use(&$result) {
            if($this->$field == null) {
                $result = false;
            }
        });

        return $result;
    }
}
