<?php

namespace App\Http\Livewire\Logs;

use Livewire\Component;

class SearchingMobil extends Component
{
    public $value = '';

    public function render()
    {
        return view('livewire.logs.searching-mobil');
    }

    public function updatedValue()
    {
        $this->emit('searching', $this->value);
    }
}
