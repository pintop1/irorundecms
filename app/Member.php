<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    use Notifiable;

    protected $guard = 'member';

    protected $fillable = [
        'first_name', 'last_name', 'other_names', 'title', 'phone', 'email', 'password', 'status','passport',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}