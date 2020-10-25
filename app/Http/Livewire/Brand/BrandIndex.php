<?php

namespace App\Http\Livewire\Brand;

use App\Brand;
use Livewire\Component;
use Livewire\WithPagination;

class BrandIndex extends Component
{
    use WithPagination;

    public $brand, $id_brand, $nama_brand;

    protected $paginationTheme = 'bootstrap';
    protected $rules = [
        'nama_brand' => 'required',
    ];

    public function render()
    {
        $brands = Brand::with('mobils')->latest()->paginate(5);

        return view('livewire.brand.brand-index', compact('brands'));
    }

    /*
        CREATE BRAND
    */
    public function openTambahModal()
    {
        $this->nama_brand = '';
        $this->dispatchBrowserEvent('openCreateBrandModal');
    }

    public function closeTambahModal()
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

    /*
        EDIT BRAND
    */
    public function openEditModal($brand)
    {
        $this->brand = $brand;
        $this->nama_brand = $brand['nama_brand'];
        $this->id_brand = $brand['id'];

        $this->dispatchBrowserEvent('openEditBrandModal');
    }

    public function closeEditModal()
    {
        $this->dispatchBrowserEvent('closeEditBrandModal');
    }

    public function update($id_brand)
    {
        $this->validate();

        $brand = Brand::find($id_brand);
        $brand->update(['nama_brand' => $this->nama_brand]);

        $this->dispatchBrowserEvent('closeEditBrandModal');
        $this->dispatchBrowserEvent('edit-success');
    }

    /*
        Delete BRAND
    */
    public function openDeleteModal($brand)
    {
        $this->brand = $brand;
        $this->nama_brand = $brand['nama_brand'];
        $this->id_brand = $brand['id'];

        $this->dispatchBrowserEvent('openDeleteBrandModal');
    }

    public function destroy($id_brand)
    {
        $brand = Brand::find($id_brand);
        $brand->delete();

        $this->dispatchBrowserEvent('closeDeleteBrandModal');
        $this->dispatchBrowserEvent('delete-success');
    }
}
