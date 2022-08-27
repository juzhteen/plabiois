<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Resident;

class ResidentsPage extends Component
{
    use WithPagination;

    public $resident_id, $name, $age, $gender, $civil_status, $religion, $weight, $height, $purok;
    public $openEdit, $openDelete = false;

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
        $this->name = $resident->name;
        $this->age = $resident->age;
        $this->gender = $resident->gender;
        $this->civil_status = $resident->civil_status;
        $this->religion = $resident->religion;
        $this->weight = $resident->weight;
        $this->height = $resident->height;
        $this->purok = $resident->purok;
        $this->openEdit = true;
    }

    public function closeEditModal()
    {
        $this->clear();
        $this->openEdit = false;
    }

    public function store()
    {
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
            ]
        );

        session()->flash(
            "message",
            $this->resident_id
                ? "Resident record updated successfully."
                : "Resident record created successfully."
        );

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
        $this->clear();
        $this->closeDeleteModal();
    }

    public function clear()
    {
        $this->resident_id = null;
        $this->name = "";
    }

}
