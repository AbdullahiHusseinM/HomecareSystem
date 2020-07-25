<?php

namespace App;


use Silber\Bouncer\Database\HasRolesAndAbilities;
use App\Notifications\PasswordResetNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmails;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasApiTokens, HasRolesandAbilities;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'password', 'email','foreign_id', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    CONST Roles = [
        'caregiver',
        'transporter',
        'securityprovider',
        'pharmacy'
    ];

    public function details()
    {
        if($this->role == 'caregiver') {
            return $this->caregiver;
        }

        if($this->role == 'securityprovider') {
            return $this->securityprovider;
        }

        if($this->role == 'transporter') {
            return $this->transporter;
        }

        if($this->role == 'pharmacy') {
            return $this->pharmacy;
        }
    }
    

    public function caregiver()
    {
       
        return $this->belongsTo(Caregiver::class, 'foreign_id', 'id');
        
    }

    public function transport()
    {
        return $this->belongsTo(Transporter::class, 'foreign_id', 'id');
        
    }

    public function security()
    {
        return $this->belongsTo(Securityprovider::class, 'foreign_id', 'id');
        
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class, 'foreign_id', 'id');
       
    }
    
    public function pharmacy()
    {
        return $this->belongsTo(Pharmacy::class, 'foreign_id', 'id');
       
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }
}
