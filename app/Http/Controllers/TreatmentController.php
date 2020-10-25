<?php

namespace App\Http\Controllers;

use App\Treatment;
use App\Mobil;

class TreatmentController extends Controller
{

    public function index()
    {
        return view('treatments.index');
    }

    // public function create()
    // {
    //     $mobils = Mobil::get();

    //     return view('treatments.create', compact('mobils'));
    // }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'mobil_id' => 'required',
    //         'jenis' => 'required',
    //         'waktu' => 'required',
    //     ]);

    //     Treatment::create($request->all());

    //     return response()->json(true);
    // }

    // public function update(Request $request, Treatment $treatment)
    // {
    //     Treatment::where('id', $treatment->id)
    //         ->update([
    //             'mobil_id' => $request->mobil_id,
    //             'jenis' => $request->jenis,
    //             'waktu' => $request->waktu
    //         ]);

    //     return redirect()->back();
    // }

    // public function destroy(Treatment $treatment)
    // {
    //     $treatment->delete();

    //     return redirect()->back();
    // }
}
