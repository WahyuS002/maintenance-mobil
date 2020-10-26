<?php

namespace App\Http\Controllers;

use App\Mobil;
use App\Driver;
use App\Laporan;

use Illuminate\Http\Request;

use Auth;

class LogController extends Controller
{
    public function index()
    {
        $driver_id = Auth::user()->id;

        $laporan = Laporan::where('driver_id', $driver_id)->get();

        return view('logs.index', compact('laporan'));
    }

    public function create()
    {
        $mobils = Mobil::latest()->get();

        return view('logs.create', compact('mobils'));
    }
}
