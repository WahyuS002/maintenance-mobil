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

        $drivers = Driver::find($driver_id);

        return view('logs.index', [
            'drivers' => $drivers,
        ]);
    }

    public function create()
    {
        $mobils = Mobil::latest()->get();

        return view('logs.create', compact('mobils'));
    }

    public function update(Request $request, Laporan $laporan)
    {
        $laporan->id = $request->id;
        $laporan->mobil_id = $request->mobil_id;
        $laporan->driver_id = Auth::user()->id;
        $laporan->laporan = $request->laporan;
        $laporan->waktu = $request->waktu;
        $laporan->biaya = $request->biaya;


        $laporan->save();

        return redirect()->back();
    }

    public function destroy(laporan $laporan)
    {
        $laporan->delete();

        return redirect()->back();
    }
}
