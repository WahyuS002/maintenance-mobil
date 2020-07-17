<?php

namespace App\Http\Controllers;

use App\Mobil;
use App\DriverMobil;

use Illuminate\Http\Request;

use Auth;

class LogController extends Controller
{
    public function index()
    {
        return view('logs.index');
        // return dd(Auth::user());
    }

    public function create()
    {
        $mobils = Mobil::latest()->get();

        return view('logs.mobil', compact('mobils'));
    }

    public function store(Request $request, Mobil $mobil)
    {
        $logs = $request->all();
        $logs['driver_id'] = Auth::user()->id;
        $logs['mobil_id'] = $mobil->id;

        DriverMobil::create($logs);

        return redirect()->back();
    }
}
