<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Driver;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
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

    public function update(UpdateProfileRequest $request)
    {
        $id = Auth::user()->id;
        $data = $request->validated();

        if ($request->foto != null) {
            $nama_file = $request->foto->getClientOriginalName();
            $foto = $request->foto->storeAs('foto', $nama_file, 'public');
            $data['foto'] = $foto;
        }

        Driver::where('id', $id)->update($data);

        return redirect()->back()->with('status-success', 'Berhasil Ubah Profil!');
    }

    public function passwordForm()
    {
        return view('settings.passwordForm');
    }

    public function password(ChangePasswordRequest $request)
    {
        $id = Auth::user()->id;

        $pw_lama = Driver::select('password')
            ->where('id', $id)
            ->pluck('password');

        if (Hash::check($request->pw_lama, $pw_lama[0])) {
            // $this->validate(
            //     $request,
            //     [
            //         'pw_baru1' => 'required',
            //         'pw_baru2' => 'required'
            //     ],
            //     [
            //         'pw_baru1.required' => 'This field is required',
            //         'pw_baru2.required' => 'This field is required'
            //     ]
            // );

            $pw1 = $request->pw_baru1;
            $pw2 = $request->pw_baru2;

            if ($pw1 == $pw2) {
                $new_pw = Hash::make($pw1);

                Driver::where('id', $id)->update(['password' => $new_pw]);

                return redirect()->back()->with('status-success', 'Password Berhasil Diubah');
            }

            return redirect()->back()->with('status-error', 'Password Tidak Sama');
        }

        // Jika Gagal
        return redirect()->back()->with('status-error', 'Password Tidak Sama');
    }
}
