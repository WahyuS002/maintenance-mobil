<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drivers = Driver::latest()->get();

        return view('drivers.index', ['drivers' => $drivers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "nama" => "required",
            "nik" => "required",
            "foto" => "required"
        ]);

        if ($request->hasFile('foto')) {

            $driver = $request->all();

            $driver['role'] = 'Driver';
            $driver['password'] = Hash::make('qweasd');

            $nama_file = $request->foto->getClientOriginalName();
            $driver['foto'] = $request->foto->storeAs('foto', $nama_file, 'public');

            Driver::create($driver);
        }

        return redirect()->to('/driver');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {
        return view('drivers', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Driver $driver)
    {
        if ($request->hasFile('foto')) {
            $driver->nama = $request->nama;
            $driver->nik = $request->nik;

            $nama_file = $request->foto->getClientOriginalName();
            $driver->foto = $request->foto->storeAs('foto', $nama_file, 'public');

            // Mass Assignment
            // $nama_file = $request->foto->getClientOriginalName();

            // $driver = Driver::create([
            //     'nama' => $request->nama,
            //     'nik' => $request->nik,
            //     'foto' => $request->foto->storeAs('foto', $nama_file, 'public')
            // ]);

            $driver->save();
        }
        return redirect()->to('/driver');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Driver  $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->delete();

        return redirect()->to('/driver');
    }
}
