<?php

namespace App\Http\Controllers;

use App\Mobil;
use App\Brand;

use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobils = Mobil::latest()->get();

        $brands = Brand::all();

        return view('mobil.index', [
            'mobils' => $mobils,
            'brands' => $brands
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mobil.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'no_plat' => 'required',
        //     'nama_mobil' => 'required',
        //     'tipe_mobil' => 'required',
        //     'max_minyak' => 'required',
        //     'foto' => 'required'
        // ]);

        if ($request->hasFile('foto')) {
            $mobil = $request->all();

            $nama_file = $request->foto->getClientOriginalName();
            $mobil['foto'] = $request->foto->storeAs('foto', $nama_file, 'public');

            Mobil::Create($mobil);
        }

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function show(Mobil $mobil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit(Mobil $mobil)
    {
        return view('mobil', compact('mobil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mobil $mobil)
    {
        if ($request->hasFile('foto')) {
            $mobil->brand_id = $request->brand_id;
            $mobil->no_plat = $request->no_plat;
            $mobil->nama_mobil = $request->nama_mobil;
            $mobil->max_minyak = $request->max_minyak;

            $nama_file = $request->foto->getClientOriginalName();
            $mobil->foto = $request->foto->storeAs('foto', $nama_file, 'public');
            $mobil->save();
        }
        return redirect()->to('mobil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mobil  $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mobil $mobil)
    {
        $mobil->delete();

        return redirect()->back();
    }
}
