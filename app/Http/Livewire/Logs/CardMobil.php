<?php

namespace App\Http\Livewire\Logs;

use App\Laporan;
use Livewire\Component;
use App\Mobil;
use App\Driver;

use Illuminate\Support\Facades\Auth;

class CardMobil extends Component
{
    public $id_mobil, $nama_mobil, $no_plat_mobil;
    public $laporan, $waktu, $biaya;
    public $user_id;

    protected $listeners = ['searching'];
    public $search = null;

    public function mount()
    {
        $this->user_id = Auth::user()->id;
    }

    public function render()
    {
        if ($this->search !== null) {
            $mobils = Mobil::query()->search($this->search)->paginate(8);
        } else {
            $mobils = Mobil::latest()->paginate(8);
        }
        return view('livewire.logs.card-mobil', compact('mobils'));
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
        $mobil = Mobil::find($mobil_id);
        $driver = Driver::find($this->user_id);

        $validatedData = $this->validate([
            'laporan' => 'required',
            'waktu' => 'required',
            'biaya' => 'required',
        ]);

        $validatedData['driver_id'] = $driver->id;
        $validatedData['mobil_id'] = $mobil->id;
        $validatedData['nama_driver'] = $driver->nama;
        $validatedData['nama_mobil'] = $mobil->nama_mobil;
        $validatedData['no_plat'] = $mobil->no_plat;

        Laporan::create($validatedData);

        $this->id_mobil = '';
        $this->nama_mobil = '';
        $this->no_plat_mobil = '';

        $this->dispatchBrowserEvent('logCreated');
        return redirect()->route('log');
    }

    public function searching($search)
    {
        $this->search = $search;
    }
}
