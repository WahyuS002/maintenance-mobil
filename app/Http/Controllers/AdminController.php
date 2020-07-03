<?php

namespace App\Http\Controllers;

use App\Driver;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index()
    {
        return view('admin.index');
    }
}
