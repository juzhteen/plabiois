<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Resident;
use App\Models\Employee;
use App\Models\Attendance;
use App\Models\Request;

class ResidentsPage extends Component
{
    use WithPagination;

    public $resident_id, $name, $age, $gender, $civil_status, $religion, $weight, $height, $purok, $email_address, $phone_number, $birthdate;
    public $openEdit, $openDelete = false;

    public $orderBy = "name";
    public $orderByOrder = "asc";
    public $search = "";
    public $searchBy;

    protected $rules = [
        'name' => 'required',
        'age' => 'required|integer',
        'gender' => 'required',
        'civil_status' => 'required',
        'religion' => 'required',
        'weight' => 'required|integer',
        'height' => 'required|integer',
        'purok' => 'required|integer|min:1|max:7',
        'birthdate' => 'required'
    ];

    public function mount()
    {
        $this->searchBy = "all";
    }

    public function render()
    {
        if ($this->searchBy == "all") {
            $residents = $this->search
                ? Resident::where("name", "like", "%" . $this->search . "%")
                    ->orWhere("age", "=", $this->search)
                    ->orWhere("gender", "=", $this->search)
                    ->orWhere("civil_status", "like", "%" . $this->search . "%")
                    ->orWhere("religion", "like", "%" . $this->search . "%")
                    ->orWhere("weight", "=", $this->search)
                    ->orWhere("height", "=", $this->search)
                    ->orWhere("purok", "=", $this->search)
                    ->orWhere("email_address", "like", "%" . $this->search . "%")
                    ->orWhere("phone_number", "like", "%" . $this->search . "%")
                    ->orWhere("birthdate", "=", $this->search)
                    ->orderBy($this->orderBy, $this->orderByOrder)
                    ->paginate(10)
                : Resident::orderBy($this->orderBy, $this->orderByOrder)
                    ->paginate(10);
        } else {
            $residents = $this->search
                ? Resident::where($this->searchBy, "like", "%" . $this->search . "%")
                    ->orderBy($this->orderBy, $this->orderByOrder)
                    ->paginate(10)
                : Resident::orderBy($this->orderBy, $this->orderByOrder)
                    ->paginate(10);
        }

        $total_residents = Resident::all()->count();

        return view('livewire.residents.residents-page', ["residents" => $residents, "total_residents" => $total_residents]);
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
        $this->birthdate = $resident->birthdate;
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
                "phone_number" => $this->phone_number,
                "birthdate" => $this->birthdate
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
        $resident = Resident::where('resident_id', $this->resident_id)->first();

        if ($resident) {
            $resident->delete();

            // Delete employee record
            $employee = Employee::where('resident_resident_id', $this->resident_id)->first();

            if ($employee) {
                $employee->delete();

                // Delete attendance records
                $attendances = Attendance::where('employee_employee_id', $employee->employee_id)->get();

                foreach ($attendances as $attendance) {
                    Attendance::where('attendance_id', $attendance->attendance_id)->delete();
                }
            }

            // Delete requests records
            $requests = Request::where('resident_resident_id', $this->resident_id)->get();
            if ($requests) {
                foreach ($requests as $request) {
                    Request::where('request_id', $request->request_id)->delete();
                }
            }
        }

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
        $this->birthdate = "";
        $this->resetValidation();
    }

    public function orderby($orderBy, $orderByOrder)
    {
        $this->orderBy = $orderBy;
        $this->orderByOrder = $orderByOrder;
    }

}