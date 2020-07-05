<?php

namespace App\Http\Controllers;

use App\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function show(Brand $brand)
    {
        $mobils = $brand->mobils;

        return view('mobil.index', compact('mobils'));
    }
}
