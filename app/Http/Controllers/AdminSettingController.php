<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\ChangePasswordRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminSettingController extends Controller
{
    public function index()
    {
        return view('settings.admin.password-form');
    }

    public function password(ChangePasswordRequest $request)
    {
        $id = Auth::user()->id;

        $pw_lama = User::select('password')
            ->where('id', $id)
            ->pluck('password');

        if (Hash::check($request->pw_lama, $pw_lama[0])) {

            $pw1 = $request->pw_baru1;
            $pw2 = $request->pw_baru2;

            if ($pw1 == $pw2) {
                $new_pw = Hash::make($pw1);

                User::where('id', $id)->update(['password' => $new_pw]);

                return redirect()->back()->with('status-success', 'Password Berhasil Diubah');
            }

            return redirect()->back()->with('status-error', 'Password Tidak Sama');
        }

        return redirect()->back()->with('status-error', 'Password Tidak Sama');
    }
}
