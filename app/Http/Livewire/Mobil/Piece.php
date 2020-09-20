<?php

namespace App\Http\Livewire\Mobil;

use Livewire\Component;

use App\Mobil;

class Piece extends Component
{
    public $filter = false;
    public $brand_id;

    protected $listeners = ['filter', 'allFilter'];

    public function filter($brand_id)
    {
        $this->brand_id = $brand_id;
        $this->filter = true;
    }

    public function allFilter()
    {
        $this->filter = false;
    }

    public function render()
    {
        if ($this->filter == true) {
            $mobils = Mobil::where('brand_id', $this->brand_id)->get();
        } else {
            $mobils = Mobil::latest()->get();
        }

        return view('livewire.mobil.piece', compact('mobils'));
    }
}
