<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriverMobil extends Model
{
    protected $table = 'driver_mobil';

    protected $fillable = ['driver_id', 'mobil_id', 'laporan', 'waktu', 'biaya'];
}
