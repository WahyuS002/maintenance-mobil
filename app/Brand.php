<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['nama_brand'];

    public function mobils()
    {
        return $this->hasMany(Mobil::class);
    }
}
