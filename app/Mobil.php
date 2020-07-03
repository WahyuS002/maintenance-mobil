<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = ['no_plat', 'nama_mobil', 'tipe_mobil', 'max_minyak', 'foto'];
}
