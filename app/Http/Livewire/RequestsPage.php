<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Employee;
use App\Models\EmployeeType;

class RequestsPage extends Component
{
    use WithPagination;

    public $employee_type_id, $position;
    public $openEdit, $openDelete = false;

    public function render()
    {
        $employee_types = EmployeeType::paginate(
            10
        );
        return view('livewire.requests.requests-page', ["employee_types" => $employee_types]);
    }

    public function toggleEdit()
    {
        $this->openEdit = true;
    }

    public function edit($employee_type_id)
    {
        $employee_type = EmployeeType::findOrFail($employee_type_id);
        $this->employee_type_id = $employee_type->employee_type_id;
        $this->position = $employee_type->position;
        $this->openEdit = true;
    }

    public function closeEditModal()
    {
        $this->clear();
        $this->openEdit = false;
    }

    public function store()
    {
      EmployeeType::updateOrCreate(
            ["employee_type_id" => $this->employee_type_id],
            [
              "position" => $this->position,
            ]
        );

        session()->flash(
            "message",
            $this->employee_type_id
                ? "Employee type record updated successfully."
                : "ResiEmployee typedent record created successfully."
        );

        $this->openEdit = false;
    }

    //====================DELETE=================================

    public function openDeleteModal()
    {
        $this->openDelete = true;
    }

    public function openDelete($employee_type_id)
    {
        $employee_type = EmployeeType::findOrFail($employee_type_id);
        $this->employee_type_id = $employee_type->employee_type_id;
        $this->employee_type = $employee_type->employee_type;
        $this->openDeleteModal();
    }

    public function closeDeleteModal()
    {
        $this->clear();
        $this->openDelete = false;
    }

    public function delete()
    {
        EmployeeType::findOrFail($this->employee_type_id)->delete();
        session()->flash("warning", "Employee type deleted successfully");
        $this->clear();
        $this->closeDeleteModal();
    }

    public function clear()
    {
        $this->employee_type_id = null;
        $this->position = "";
    }


}
