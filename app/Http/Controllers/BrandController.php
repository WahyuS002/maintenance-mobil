<?php

namespace App\Http\Controllers;

use App\Brand;

class BrandController extends Controller
{
    public function index()
    {
        return view('brands.index');
    }

    public function show(Brand $brand)
    {
        $mobils = $brand->mobils()->latest()->get();
        $brands = Brand::get();

        return view('mobil.index', [
            'brands' => $brands,
            'mobils' => $mobils
        ]);
    }
}
