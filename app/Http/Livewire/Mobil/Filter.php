<?php

namespace App\Http\Livewire\Mobil;

use Livewire\Component;

class Filter extends Component
{
    public $brands, $filter, $all;

    public function allFilter()
    {
        $this->emit('allFilter');
    }

    public function filter($id)
    {
        $this->filter = $id;

        $this->emit('filter', $id);
    }

    public function mount($brands)
    {
        $this->brands = $brands;
    }

    public function render()
    {
        return view('livewire.mobil.filter');
    }
}
