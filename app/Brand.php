<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public function mobils()
    {
        return $this->hasMany(Mobil::class);
    }
}
