<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DriverLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.driver-login');
    }

    public function login(Request $request)
    {
        // validasi        
        $this->validate($request, [
            'nik' => 'required',
            'password' => 'required'
        ]);

        // percobaan login
        if (Auth::guard('driver')->attempt(['nik' => $request->nik, 'password' => $request->password], $request->remember)) {
            // jika berhasil
            return redirect()->route('log');
        }

        // jika gagal
        return redirect()->back()->withInput($request->only('nik', 'remember'));
    }

    public function logout()
    {
        Auth::guard('driver')->logout();
        return redirect('driver.login');
    }
}
