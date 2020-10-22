<?php

namespace App\Http\Livewire\Logs;

use App\DriverMobil;
use Livewire\Component;
use App\Mobil;

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
    }

    public function searching($search)
    {
        $this->search = $search;
    }
}
