<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Driver extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['nama', 'nik', 'password', 'foto', 'role'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function mobils()
    {
        return $this->belongsToMany(Mobil::class, 'laporan', 'driver_id', 'mobil_id');
    }
}
