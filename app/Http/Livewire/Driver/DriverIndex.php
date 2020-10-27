<?php

namespace App\Http\Livewire\Driver;

use App\Driver;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Hash;

class DriverIndex extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $driver_id;
    public $nama, $nik, $foto;

    public $search = null;

    protected $rules = [
        'nama' => 'required',
        'nik' => 'required',
        'foto' => 'required|mimes:jpeg,jpg,png',
    ];

    protected $listeners = ['searching'];

    public function render()
    {
        if ($this->search !== null) {
            $drivers = Driver::query()
                ->search($this->search)
                ->paginate(8);
        } else {
            $drivers = Driver::latest()->paginate(8);
        }

        return view('livewire.driver.driver-index', compact('drivers'));
    }

    public function resetInputFields()
    {
        $this->nama = '';
        $this->nik = '';
        $this->foto = '';
    }

    public function searching($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    /*
        CREATE TREATMENT
    */
    public function openTambahModal()
    {
        $this->resetInputFields();
        $this->dispatchBrowserEvent('openCreateDriverModal');
    }

    public function store()
    {
        $collection = collect($this->validate())->except('page');
        $data = $collection->toArray();

        $data['foto'] = $this->foto->store('driver');
        $data['password'] = Hash::make('password');

        Driver::create($data);

        $this->dispatchBrowserEvent('closeCreateDriverModal');
        $this->dispatchBrowserEvent('store-success', ['message' => 'Driver']);
    }

    /*
        EDIT BRAND
    */
    public function openEditModal($driver)
    {
        $this->driver_id = $driver['id'];
        $this->nama = $driver['nama'];
        $this->nik = $driver['nik'];
        $this->foto = $driver['foto'];

        $this->dispatchBrowserEvent('openEditDriverModal');
    }

    public function update($driver_id)
    {
        $driver = Driver::find($driver_id);

        $collection = collect($this->validate())->except('page');
        $data = $collection->toArray();

        $data['foto'] = $this->foto->store('driver');

        $driver->update($data);
        $this->dispatchBrowserEvent('closeEditDriverModal');
        $this->dispatchBrowserEvent('edit-success', ['message' => 'Driver']);
    }

    /*
        Delete BRAND
    */
    public function openDeleteModal($driver)
    {
        $this->driver_id = $driver['id'];
        $this->nama = $driver['nama'];

        $this->dispatchBrowserEvent('openDeleteDriverModal');
    }

    public function destroy($driver_id)
    {
        $driver = Driver::find($driver_id);
        $driver->delete();

        $this->dispatchBrowserEvent('closeDeleteDriverModal');
        $this->dispatchBrowserEvent('delete-success', ['message' => 'Driver']);
    }
}
