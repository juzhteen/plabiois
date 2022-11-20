<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Employee;
use App\Models\EmployeeType;

class EmployeeTypesPage extends Component
{
    use WithPagination;

    public $employee_type_id, $position;
    public $openEdit, $openDelete = false;

    public $orderBy = "position";
    public $orderByOrder = "asc";
    public $search = "";
    public $searchBy;

    protected $rules = [
        'position' => 'required'
    ];

    public function mount()
    {
        $this->searchBy = "position";
    }

    public function render()
    {
        $employee_types = $this->search
            ? EmployeeType::join('employees', 'employee_types.employee_type_id', '=', 'employees.employee_type_employee_type_id')
                ->join('residents', 'employees.resident_resident_id', '=', 'residents.resident_id')
                ->where($this->searchBy, "like", "%" . $this->search . "%")
                ->orderBy($this->orderBy, $this->orderByOrder)
                ->paginate(10)
            : EmployeeType::join('employees', 'employee_types.employee_type_id', '=', 'employees.employee_type_employee_type_id')
                ->join('residents', 'employees.resident_resident_id', '=', 'residents.resident_id')
                ->orderBy($this->orderBy, $this->orderByOrder)
                ->paginate(10);

        $total_positions = EmployeeType::all()->count();

        // dd($employee_types);

        return view('livewire.employee-types.employee-types-page', ["employee_types" => $employee_types, "total_positions" => $total_positions]);
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
        $this->validate();

        // Check if position already exists
        $pos = EmployeeType::where('position', '=', $this->position)->first();

        if($pos){
            $this->dispatchBrowserEvent("employee_type_exists");
        }else{
            EmployeeType::updateOrCreate(
                ["employee_type_id" => $this->employee_type_id],
                [
                  "position" => $this->position,
                ]
            );
            $this->employee_type_id ? $this->dispatchBrowserEvent("employee_type_updated") : $this->dispatchBrowserEvent("employee_type_added");
            $this->openEdit = false;
        }
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
        $this->dispatchBrowserEvent("employee_type_deleted");
        $this->clear();
        $this->closeDeleteModal();
    }

    public function clear()
    {
        $this->employee_type_id = null;
        $this->position = "";
    }

    public function orderby($orderBy, $orderByOrder)
    {
        $this->orderBy = $orderBy;
        $this->orderByOrder = $orderByOrder;
    }


}
