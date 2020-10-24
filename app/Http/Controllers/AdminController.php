<?php

namespace App\Http\Controllers;

use App\Driver;
use App\Laporan;
use App\Mobil;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        $mobil_count = Mobil::all()->count();
        $driver_count = Driver::all()->count();
        $log_count = Laporan::all()->count();

        $mobils = Mobil::latest()->take(6)->get();
        $drivers = Driver::latest()->take(5)->get();

        // $treatments = Laporan::latest()->take(5)->get();

        $treatments = Laporan::join('drivers', 'drivers.id', '=', 'laporan.driver_id')
            ->latest('laporan.created_at')->take(5)->get();

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
