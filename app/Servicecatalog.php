<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicecatalog extends Model
{
    protected $table = 'servicecatalogs';


    protected $fillable = [
        'service_name',
        'service_description',
        'specific_service_name',
        'specific_service_description',
        'pharmaceutical_product_name',
        'pharmaceutical_product_use',
        'pharmaceutical_product_priority',
        'equipment_name',
        'equipment_use',
        'equipment_priority',
        
    ];
}
