<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Driver;
use Auth;

use Hash;

class SettingController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;

        $driver = Driver::where('id', $id)->first();

        return view('settings.index')->with('driver', $driver);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $data = $request->except(['_token', '_method']);

        Driver::where('id', $id)->update($data);

        return redirect()->back();
        // Driver::update($data)->where('id', 1);
    }

    public function passwordForm()
    {
        return view('settings.passwordForm');
    }

    public function password(Request $request)
    {
        $id = Auth::user()->id;

        $pw_lama = Driver::select('password')
            ->where('id', $id)
            ->pluck('password');

        // dd($request->pw_lama);

        if (Hash::check($request->pw_lama, $pw_lama[0])) {
            $this->validate(
                $request,
                [
                    'pw_baru1' => 'required',
                    'pw_baru2' => 'required'
                ],
                [
                    'pw_baru1.required' => 'This field is required',
                    'pw_baru2.required' => 'This field is required'
                ]
            );

            $pw1 = $request->pw_baru1;
            $pw2 = $request->pw_baru2;

            if ($pw1 == $pw2) {
                $new_pw = Hash::make($pw1);

                Driver::where('id', $id)->update(['password' => $new_pw]);

                return redirect()->back()->with('success-status', 'Password Berhasil Diubah');
            }

            return redirect()->back()->with('status', 'Password Tidak Sama');
        }

        // Jika Gagal
        return redirect()->back()->with('status', 'Password Tidak Sama');
    }
}
