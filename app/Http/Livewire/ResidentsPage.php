<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Resident;

class ResidentsPage extends Component
{
    use WithPagination;

    public $resident_id, $name, $age, $gender, $civil_status, $religion, $weight, $height, $purok, $email_address, $phone_number;
    public $openEdit, $openDelete = false;

    protected $rules = [
        'name' => 'required',
        'age' => 'required',
        'gender' => 'required',
        'civil_status' => 'required',
        'religion' => 'required',
        'weight' => 'required',
        'height' => 'required',
        'purok' => 'required',
        'email_address' => 'required',
        'phone_number' => 'required'
    ];

    public function render()
    {
        $residents = Resident::paginate(
            10
        );
        return view('livewire.residents.residents-page', ["residents" => $residents]);
    }

    public function toggleEdit()
    {
        $this->openEdit = true;
    }

    public function edit($resident_id)
    {
        $resident = Resident::findOrFail($resident_id);
        $this->resident_id = $resident->resident_id;
        $this->name = $resident->name;
        $this->age = $resident->age;
        $this->gender = $resident->gender;
        $this->civil_status = $resident->civil_status;
        $this->religion = $resident->religion;
        $this->weight = $resident->weight;
        $this->height = $resident->height;
        $this->purok = $resident->purok;
        $this->email_address = $resident->email_address;
        $this->phone_number = $resident->phone_number;
        $this->openEdit = true;
    }

    public function closeEditModal()
    {
        $this->clear();
        $this->openEdit = false;
    }

    public function store()
    {

        $this->validate();

        Resident::updateOrCreate(
            ["resident_id" => $this->resident_id],
            [
                "name" => $this->name,
                "age" => $this->age,
                "gender" => $this->gender,
                "civil_status" => $this->civil_status,
                "religion" => $this->religion,
                "weight" => $this->weight,
                "height" => $this->height,
                "purok" => $this->purok,
                "email_address" => $this->email_address,
                "phone_number" => $this->phone_number
            ]
        );
        $this->resident_id ? $this->dispatchBrowserEvent("resident_updated") : $this->dispatchBrowserEvent("resident_added");
        $this->clear();
        $this->openEdit = false;
    }

    //====================DELETE=================================

    public function openDeleteModal()
    {
        $this->openDelete = true;
    }

    public function openDelete($resident_id)
    {
        $resident = Resident::findOrFail($resident_id);
        $this->resident_id = $resident->resident_id;
        $this->name = $resident->name;
        $this->openDeleteModal();
    }

    public function closeDeleteModal()
    {
        $this->clear();
        $this->openDelete = false;
    }

    public function delete()
    {
        Resident::findOrFail($this->resident_id)->delete();
        session()->flash("warning", "Resident deleted successfully");
        $this->dispatchBrowserEvent("resident_deleted");
        $this->clear();
        $this->closeDeleteModal();
    }

    public function clear()
    {
        $this->resident_id = null;
        $this->name = "";
        $this->age = "";
        $this->gender = "";
        $this->civil_status = "";
        $this->religion = "";
        $this->weight = "";
        $this->height = "";
        $this->purok = "";
        $this->email_address = "";
        $this->phone_number = "";
    }

}
