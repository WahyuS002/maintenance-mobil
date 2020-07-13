<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Driver extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['nama', 'nik', 'foto'];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
