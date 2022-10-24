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
    public $employee_id, $resident_id, $employee_type_id, $term_start, $term_end, $emp_code;
    public $openEdit, $openDelete, $openQr = false;
    public $residentQuery, $residentQueryResult;
    public $positionQuery, $positionQueryResult;

    public $orderBy = "residents.name";
    public $orderByOrder = "asc";
    public $search = "";
    public $searchBy;

    protected $rules = [
        'resident_id' => 'required',
        'employee_type_id' => 'required',
        'term_start' => 'required',
        'term_end' => 'required'
    ];

    public function mount()
    {
        $this->residentQuery = "";
        $this->residentQueryResult = [];
        $this->positionQuery = "";
        $this->positionQueryResult = [];

        $this->searchBy = "all";
    }

    public function render()
    {
        if($this->residentQuery == ""){
            $this->residentQueryResult = [];
        }

        if($this->positionQuery == ""){
            $this->positionQueryResult = [];
        }

        $employees = $this->search
            ? Employee::where("residents.name", "like", "%" . $this->search . "%")
                ->orWhere("employee_types.position", "like", "%" . $this->search . "%")
                ->orWhere("term_start", "like", "%" . $this->search . "%")
                ->orWhere("term_end", "like", "%" . $this->search . "%")
                ->join(
                "residents",
                "employees.resident_resident_id",
                "=",
                "residents.resident_id"
                )
                ->join(
                    "employee_types",
                    "employees.employee_type_employee_type_id",
                    "=",
                    "employee_types.employee_type_id"
                )
                ->orderBy($this->orderBy, $this->orderByOrder)
                ->paginate(10)
            : Employee::join(
                "residents",
                "employees.resident_resident_id",
                "=",
                "residents.resident_id"
                )
                ->join(
                    "employee_types",
                    "employees.employee_type_employee_type_id",
                    "=",
                    "employee_types.employee_type_id"
                )
                ->orderBy($this->orderBy, $this->orderByOrder)
                ->paginate(10);

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
    
            $this->employee_id ? $this->dispatchBrowserEvent("employee_updated") : $this->dispatchBrowserEvent("employee_added");
            
            $this->clear();
            $this->openEdit = false;
        }else{

             // Check if resident profile is already present
            $resident_profile = Employee::where("resident_resident_id", $this->resident_id)->first();

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
                    $this->validate();
                    
                    Employee::updateOrCreate(
                        ["employee_id" => $this->employee_id],
                        [
                            "employee_id" => $this->employee_id,
                            "resident_resident_id" => $this->resident_id,
                            "employee_type_employee_type_id" => $this->employee_type_id,
                            "term_start" => $this->term_start,
                            "term_end" => $this->term_end,
                            "employee_code" => $employee_code
                        ]
                    );
            
                    $this->employee_id ? $this->dispatchBrowserEvent("employee_updated") : $this->dispatchBrowserEvent("employee_added");
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
        $this->dispatchBrowserEvent("employee_deleted");
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

    // QR

    public function openQrModal($employee_id)
    {
        $employee = Employee::findOrFail($employee_id);
        $this->emp_code = $employee->employee_code;
        $this->openQr = true;

    }

    public function closeQrModal()
    {
        $this->clear();
        $this->openQr = false;
    }

    public function orderby($orderBy, $orderByOrder)
    {
        $this->orderBy = $orderBy;
        $this->orderByOrder = $orderByOrder;
    }


}
