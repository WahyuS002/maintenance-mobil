<?php

namespace App\Http\Controllers;

use App\Mobil;

use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index()
    {
        return view('logs.index');
    }

    public function mobil()
    {
        $mobils = Mobil::latest()->get();

        return view('logs.mobil', compact('mobils'));
    }
}
