<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = ['brand_id', 'no_plat', 'nama_mobil', 'max_minyak', 'foto'];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
