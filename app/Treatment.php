<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{

    protected $fillable = ['mobil_id', 'jenis', 'waktu'];

    public function mobil()
    {
        return $this->belongsTo(Mobil::class);
    }

    public function scopeFilter($query, $val)
    {
        return $query
            ->where('mobil_id', $val)
            ->latest()->paginate(5);
    }
}
