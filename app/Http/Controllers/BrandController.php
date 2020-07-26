<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return view('brands.index', compact("brands"));
    }

    public function show(Brand $brand)
    {
        $mobils = $brand->mobils()->latest()->get();

        return view('mobil.index', compact('mobils'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_brand' => 'required'
        ]);

        $brand = $request->all();

        Brand::create($brand);

        return redirect()->back();
    }

    public function update(Request $request, Brand $brand)
    {
        $brand->nama_brand = $request->nama_brand;

        $brand->save();

        return redirect()->back();
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->back();
    }
}
