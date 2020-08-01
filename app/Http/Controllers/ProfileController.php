<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Driver;
use App\DriverMobil;
use Auth;

class ProfileController extends Controller
{

    public function index()
    {
        $id = Auth::user()->id;
        $driver = Driver::where('id', $id)->first();

        $laporan = DriverMobil::where('driver_id', $id)->latest()->get();

        return view('profiles.index', [
            'driver' => $driver,
            'laporan' => $laporan
        ]);
    }
}
