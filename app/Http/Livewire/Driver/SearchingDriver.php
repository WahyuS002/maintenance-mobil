<?php

namespace App\Http\Livewire\Driver;

use Livewire\Component;

class SearchingDriver extends Component
{
    public $value = '';

    public function render()
    {
        return view('livewire.driver.searching-driver');
    }

    public function updatedValue()
    {
        $this->emit('searching', $this->value);
    }
}
