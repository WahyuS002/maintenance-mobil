<?php

namespace App\Http\Livewire\Mobil;

use Livewire\Component;

use App\Mobil;

class Piece extends Component
{
    public $search = null;

    protected $listeners = ['searching'];

    public function render()
    {
        if ($this->search !== null) {
            $mobils = Mobil::query()
                ->search($this->search)
                ->paginate(8);
        } else {
            $mobils = Mobil::latest()->paginate(8);
        }

        return view('livewire.mobil.piece', compact('mobils'));
    }

    public function searching($search)
    {
        $this->search = $search;
    }
}
