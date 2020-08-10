<?php

namespace App\Http\Controllers;

use App\Mobil;
use App\Driver;
use App\DriverMobil;

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

    public function store(Request $request, Mobil $mobil)
    {
        $this->validate($request, [
            'laporan' => 'required',
            'waktu' => 'required',
            'biaya' => 'required'
        ]);

        $logs = $request->all();
        $logs['driver_id'] = Auth::user()->id;
        $logs['mobil_id'] = $mobil->id;

        DriverMobil::create($logs);

        return response()->json(true);
    }

    public function update(Request $request, DriverMobil $driverMobil)
    {
        $driverMobil->id = $request->id;
        $driverMobil->mobil_id = $request->mobil_id;
        $driverMobil->driver_id = Auth::user()->id;
        $driverMobil->laporan = $request->laporan;
        $driverMobil->waktu = $request->waktu;
        $driverMobil->biaya = $request->biaya;


        $driverMobil->save();

        return redirect()->back();
    }

    public function destroy(DriverMobil $driver_mobil)
    {
        $driver_mobil->delete();

        return redirect()->back();
    }

    public function findMe(Request $request)
    {
        $value = $request->input('value');

        $mobils = Mobil::where('nama_mobil', 'like', '%' . $value . '%')
            ->orWhere('no_plat', 'like', '%' . $value . '%')
            ->get();

        return view('logs.card', compact('mobils'));
    }
}
