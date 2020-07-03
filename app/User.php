<?php

namespace App;

use App\Notifications\PasswordResetNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmails;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasApiTokens;

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

    const ROLES = [
        'admin' => 'admin',
        'caregiver' => 'caregiver',
        'transport' => 'transport',
        'security' => 'security',
    ];

    public function caregiver()
    {
        return $this->belongsTo(Caregiver::class, 'foreign_id', 'caregiver_id');
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

    public function details()
    {
        switch($this->role) {
            case 'admin': 
                return $this->admin;

            case 'caregiver':
                return $this->caregiver;

            case 'security': 
                return $this->security;

            case 'transport': 
                return $this->transport;

            default: 
                abort(401);
        }
    }


    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordResetNotification($token));
    }
}
