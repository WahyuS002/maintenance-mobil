<?php

namespace App\Http\Controllers;

use App\Driver;
use App\DriverMobil;
use App\Mobil;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        $mobil_count = Mobil::all()->count();
        $driver_count = Driver::all()->count();
        $log_count = DriverMobil::all()->count();

        $mobils = Mobil::latest()->take(6)->get();
        $drivers = Driver::latest()->take(5)->get();

        // $treatments = DriverMobil::latest()->take(5)->get();

        $treatments = DriverMobil::join('drivers', 'drivers.id', '=', 'driver_mobil.driver_id')
            ->latest('driver_mobil.created_at')->take(5)->get();

        return view('admin.index', [
            'mobil_count' => $mobil_count,
            'driver_count' => $driver_count,
            'log_count' => $log_count,
            'mobils' => $mobils,
            'drivers' => $drivers,
            'treatments' => $treatments
        ]);
    }
}
