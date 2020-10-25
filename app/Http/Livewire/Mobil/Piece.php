<?php

namespace App\Http\Livewire\Mobil;

use Livewire\Component;

use App\Mobil;
use Livewire\WithFileUploads;

class Piece extends Component
{
    use WithFileUploads;

    public $brands;
    public $id_mobil;
    public $brand_id, $no_plat, $nama_mobil, $max_minyak, $foto;

    public $search = null;

    protected $rules = [
        'brand_id' => 'required',
        'no_plat' => 'required',
        'nama_mobil' => 'required',
        'max_minyak' => 'required',
        'foto' => 'required|mimes:jpg,png',
    ];
    protected $listeners = ['searching'];

    public function mount($brands)
    {
        $this->brands = $brands;
    }

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

    /*
        RESET INPUT FIELD
    */
    public function resetInputFields()
    {
        $this->brand_id = '';
        $this->no_plat = '';
        $this->nama_mobil = '';
        $this->max_minyak = '';
        $this->foto = '';
    }


    /*
        CREATE MOBIL
    */
    public function openTambahModal()
    {
        $this->resetInputFields();
        $this->dispatchBrowserEvent('openCreateMobilModal');
    }

    public function store()
    {
        $collection = collect($this->validate())->except('search');
        $data = $collection->toArray();

        $data['foto'] = $this->foto->store('mobil');

        Mobil::create($data);

        $this->dispatchBrowserEvent('closeCreateMobilModal');
        $this->dispatchBrowserEvent('store-success', ['message' => 'Mobil']);
    }

    /*
        EDIT BRAND
    */
    public function openEditModal($mobil)
    {
        $this->id_mobil = $mobil['id'];
        $this->no_plat = $mobil['no_plat'];
        $this->nama_mobil = $mobil['nama_mobil'];
        $this->max_minyak = $mobil['max_minyak'];
        $this->foto = $mobil['foto'];

        $this->dispatchBrowserEvent('openEditMobilModal');
    }

    public function update($id_mobil)
    {
        $this->validate();
        $mobil = Mobil::find($id_mobil);

        $collection = collect($this->validate())->except('search');
        $data = $collection->toArray();

        $data['foto'] = $this->foto->store('mobil');

        $mobil->update($data);
        $this->dispatchBrowserEvent('closeEditMobilModal');
        $this->dispatchBrowserEvent('edit-success', ['message' => 'Mobil']);
    }

    /*
        Delete BRAND
    */
    public function openDeleteModal($mobil)
    {
        $this->id_mobil = $mobil['id'];
        $this->nama_mobil = $mobil['nama_mobil'];

        $this->dispatchBrowserEvent('openDeleteMobilModal');
    }

    public function destroy($mobil)
    {
        $mobil = Mobil::find($mobil);
        $mobil->delete();

        $this->dispatchBrowserEvent('closeDeleteMobilModal');
        $this->dispatchBrowserEvent('delete-success', ['message' => 'Mobil']);
    }
}
