<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = 'admins';


    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'foreign_id', 'id');
    }
}
