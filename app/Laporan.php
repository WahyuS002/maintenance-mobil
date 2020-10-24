<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan';

    protected $fillable = ['driver_id', 'mobil_id', 'laporan', 'waktu', 'biaya'];

    // public function drivers()
    // {
    //     return $this->belongsToMany(Driver::class);
    // }
}
