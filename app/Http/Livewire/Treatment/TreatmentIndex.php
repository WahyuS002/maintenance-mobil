<?php

namespace App\Http\Livewire\Treatment;

use App\Treatment;
use App\Mobil;
use Livewire\Component;

class TreatmentIndex extends Component
{
    public $treatment_id, $mobil_id, $jenis, $waktu;
    public $id_mobil;

    protected $filter = null;

    protected $rules = [
        'mobil_id' => 'required',
        'jenis' => 'required',
        'waktu' => 'required',
    ];

    public function render()
    {
        if ($this->filter !== null) {
            $treatments = Treatment::query()->filter($this->filter);
        } else {
            $treatments = Treatment::with('mobil')->latest()->paginate(5);
        }

        $mobils = Mobil::get();

        return view('livewire.treatment.treatment-index', compact('treatments', 'mobils'));
    }

    public function resetInputFields()
    {
        $this->mobil_id = '';
        $this->jenis = '';
        $this->waktu = '';
    }

    public function resetFilter()
    {
        $this->filter = null;
    }

    /*
        CREATE TREATMENT
    */
    public function openTambahModal()
    {
        $this->resetInputFields();
        $this->dispatchBrowserEvent('openCreateTreatmentModal');
    }

    public function store()
    {
        $data = $this->validate();

        Treatment::create($data);

        $this->dispatchBrowserEvent('closeCreateTreatmentModal');
        $this->dispatchBrowserEvent('store-success', ['message' => 'Treatment']);
    }

    /*
        EDIT BRAND
    */
    public function openEditModal($treatment)
    {
        $this->treatment_id = $treatment['id'];
        $this->mobil_id = $treatment['mobil_id'];
        $this->jenis = $treatment['jenis'];
        $this->waktu = $treatment['waktu'];

        $this->dispatchBrowserEvent('openEditTreatmentModal');
    }

    public function update($treatment_id)
    {
        $treatment = Treatment::find($treatment_id);

        $data = $this->validate();

        $treatment->update($data);
        $this->dispatchBrowserEvent('closeEditTreatmentModal');
        $this->dispatchBrowserEvent('edit-success', ['message' => 'Treatment']);
    }

    /*
        Delete BRAND
    */
    public function openDeleteModal($treatment)
    {
        $this->treatment_id = $treatment['id'];

        $this->dispatchBrowserEvent('openDeleteTreatmentModal');
    }

    public function destroy($treatment_id)
    {
        $treatment = Treatment::find($treatment_id);
        $treatment->delete();

        $this->dispatchBrowserEvent('closeDeleteTreatmentModal');
        $this->dispatchBrowserEvent('delete-success', ['message' => 'Treatment']);
    }

    public function updatedIdMobil($val)
    {
        $this->filter = $val;
    }
}
