<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'status', 'is_super',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}