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
        return view('drivers.index');
    }
}
