<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Employee;
use App\Models\Resident;
use App\Models\EmployeeType;
use Illuminate\Support\Str;

class EmployeesPage extends Component
{
    use WithPagination;

    public $name;
    public $employee_id, $resident_id, $employee_type_id, $term_start, $term_end;
    public $openEdit, $openDelete = false;
    public $residentQuery, $residentQueryResult;
    public $positionQuery, $positionQueryResult;

    public function mount()
    {
        $this->residentQuery = "";
        $this->residentQueryResult = [];
        $this->positionQuery = "";
        $this->positionQueryResult = [];
    }

    public function render()
    {
        if($this->residentQuery == ""){
            $this->residentQueryResult = [];
        }

        if($this->positionQuery == ""){
            $this->positionQueryResult = [];
        }

        $employees = Employee::paginate(10);
        return view('livewire.employees.employees-page', ["employees" => $employees]);
    }

    public function updatedResidentQuery()
    {
        $this->residentQueryResult = Resident::where("name", "like", "%". $this->residentQuery ."%")->get();
    }

    public function updatedPositionQuery()
    {
        $this->positionQueryResult = EmployeeType::where("position", "like", "%". $this->positionQuery ."%")->get();
    }

    public function setResidentProfile($resident)
    {
        $this->residentQuery = $resident["name"];
        $this->resident_id = $resident["resident_id"];
        $this->residentQueryResult = [];
    }

    public function setPosition($position)
    {
        $this->positionQuery = $position["position"];
        $this->employee_type_id = $position["employee_type_id"];
        $this->positionQueryResult = [];
    }

    public function toggleEdit()
    {
        $this->openEdit = true;
    }

    public function edit($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $this->employee_id = $employee->employee_id;
        $this->resident_id = $employee->resident->resident_id;
        $this->employee_type_id = $employee->employee_type_id;
        $this->term_start = $employee->term_start;
        $this->term_end = $employee->term_end;
        $this->residentQuery = $employee->resident->name;
        $this->positionQuery = $employee->employee_type->position;
        $this->openEdit = true;
    }

    public function closeEditModal()
    {
        $this->clear();
        $this->openEdit = false;
    }

    public function store()
    {

        if ($this->employee_id){
            Employee::updateOrCreate(
                ["employee_id" => $this->employee_id],
                [
                    "resident_id" => $this->resident_id,
                    "employee_type_id" => $this->employee_type_id,
                    "term_start" => $this->term_start,
                    "term_end" => $this->term_end
                ]
            );
    
            session()->flash(
                "message",
                $this->employee_id
                    ? "Resident record updated successfully."
                    : "Resident record created successfully."
            );
            $this->clear();
            $this->openEdit = false;
        }else{
             // Check if resident profile is already present
            $resident_profile = Employee::where("resident_id", $this->resident_id)->first();

            if($resident_profile){

            }else{
                // Generate employee code for attendance
                $employee_code = "PLABIO-" . Str::random(4);

                // Check if employee code already exists
                $employee_code_record = Employee::where("employee_code", $employee_code)->first();
                if($employee_code_record){
                    session()->flash(
                        "message",
                        "The generated employee code already exists. Please click save again to generate a new one."
                    );
                }else{
                    Employee::updateOrCreate(
                        ["employee_id" => $this->employee_id],
                        [
                            "resident_id" => $this->resident_id,
                            "employee_type_id" => $this->employee_type_id,
                            "term_start" => $this->term_start,
                            "term_end" => $this->term_end,
                            "employee_code" => $employee_code
                        ]
                    );
            
                    session()->flash(
                        "message",
                        $this->employee_id
                            ? "Resident record updated successfully."
                            : "Resident record created successfully."
                    );
                    $this->clear();
                    $this->openEdit = false;
                }
            }
        }
    }

    //====================DELETE=================================

    public function openDeleteModal()
    {
        $this->openDelete = true;
    }

    public function openDelete($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $this->employee_id = $employee->employee_id;
        $this->name = $employee->resident->name;
        $this->openDeleteModal();
    }

    public function closeDeleteModal()
    {
        $this->clear();
        $this->openDelete = false;
    }

    public function delete()
    {
        Employee::findOrFail($this->employee_id)->delete();
        session()->flash("warning", "Employee deleted successfully");
        $this->closeDeleteModal();
    }

    public function clear()
    {
        $this->resident_id = null;
        $this->employee_id = null;
        $this->employee_type_id = null;
        $this->term_start = "";
        $this->term_end = "";
        $this->residentQuery = "";
        $this->positionQuery = "";
    }


}
