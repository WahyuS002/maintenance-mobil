<?php

namespace App\Http\Controllers;

use App\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{

    public function index()
    {
        $treatments = Treatment::all();

        return view('treatments.index', compact('treatments'));
    }

    public function store(Request $request)
    {
        Treatment::create($request->all());

        return redirect()->back();
    }

    public function update(Request $request, Treatment $treatment)
    {
        Treatment::where('id', $treatment->id)
            ->update([
                'mobil_id' => $request->mobil_id,
                'jenis' => $request->jenis,
                'waktu' => $request->waktu
            ]);

        return redirect()->back();
    }

    public function destroy(Treatment $treatment)
    {
        $treatment->delete();

        return redirect()->back();
    }
}
