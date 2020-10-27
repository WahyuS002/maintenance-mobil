<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use ShiftOneLabs\LaravelCascadeDeletes\CascadesDeletes;

class Brand extends Model
{
    use CascadesDeletes;

    protected $cascadeDeletes = ['mobils'];

    protected $fillable = ['nama_brand'];

    public function mobils()
    {
        return $this->hasMany(Mobil::class);
    }

    public function scopeSearch($query, $val)
    {
        return $query
            ->where('nama_brand', 'like', '%' . $val . '%');
    }
}
