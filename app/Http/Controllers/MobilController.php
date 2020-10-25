<?php

namespace App\Http\Controllers;

use App\Mobil;
use App\Brand;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::latest()->get();

        $brands = Brand::all();

        return view('mobil.index', [
            'mobils' => $mobils,
            'brands' => $brands
        ]);
    }
}
