<?php

namespace App\Http\Livewire\Brand;

use App\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class CreateBrand extends Component
{
    use WithPagination;

    public $nama_brand;

    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'nama_brand' => 'required',
    ];

    public function render()
    {
        $brands = Brand::latest()->paginate(5);

        return view('livewire.brand.create-brand', compact('brands'));
    }

    public function openModal()
    {
        $this->dispatchBrowserEvent('openCreateBrandModal');
    }

    public function closeModal()
    {
        $this->dispatchBrowserEvent('closeCreateBrandModal');
    }

    public function store()
    {
        $this->validate();

        Brand::create([
            'nama_brand' => $this->nama_brand,
        ]);

        $this->dispatchBrowserEvent('closeCreateBrandModal');
        $this->dispatchBrowserEvent('store-success');
    }
}
