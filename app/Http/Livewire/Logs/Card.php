<?php

namespace App\Http\Livewire\Logs;

use App\DriverMobil;
use Livewire\Component;
use App\Mobil;

use Illuminate\Support\Facades\Auth;

class Card extends Component
{
    public $mobils;
    public $id_mobil, $nama_mobil, $no_plat_mobil;
    public $laporan, $waktu, $biaya;
    public $user_id;

    public function mount($mobils)
    {
        $this->mobils = $mobils;

        $this->user_id = Auth::user()->id;
    }

    public function render()
    {
        return view('livewire.logs.card');
    }

    public function tambahLogModal($id)
    {
        $mobil = Mobil::where('id', $id)->first();

        $this->id_mobil = $id;
        $this->nama_mobil = $mobil->nama_mobil;
        $this->no_plat_mobil = $mobil->no_plat;
    }

    public function tambahLog($mobil_id)
    {
        $validatedData = $this->validate([
            'laporan' => 'required',
            'waktu' => 'required',
            'biaya' => 'required',
        ]);

        $validatedData['driver_id'] = $this->user_id;
        $validatedData['mobil_id'] = $mobil_id;

        DriverMobil::create($validatedData);

        $this->id_mobil = '';
        $this->nama_mobil = '';
        $this->no_plat_mobil = '';

        $this->dispatchBrowserEvent('logCreated');

        // dd($id);
    }
}
