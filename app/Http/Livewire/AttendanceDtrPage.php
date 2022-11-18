<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use App\Models\Employee;
use App\Models\Resident;
use App\Models\EmployeeType;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AttendanceDtrPage extends Component
{
  use WithPagination;
  
  public $month_query;
  public $year_query;
  public $current_dtr;
  public $openDtr = false;
  public $employee_dtr_record = [];
  public $attendance_month_year = null;

  public function mount()
  {
    $this->month_query = Carbon::now()->month;
    $this->year_query = Carbon::now()->year;
  }

  public function render()
  {

    // Get monthly record
    $employees = Employee::join(
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
      ->orderBy('residents.name', 'asc')
      ->paginate(10);

      if($this->attendance_month_year){
        $this->month_query = explode("-", $this->attendance_month_year)[1];
        $this->year_query = explode("-", $this->attendance_month_year)[0];
      }

    return view('livewire.attendance.attendance-dtr-page', ['employees' => $employees]);
  }

  public function show_dtr($arg)
  {
    $this->current_dtr = $arg;
    $this->openDtr = true;
    $this->employee_dtr_record = Attendance::where('employee_employee_id', '=', $arg)
      ->whereMonth('created_at', '=', $this->month_query)
      ->whereYear('created_at', '=', $this->year_query)
      ->get();
  }

  public function close_dtr()
  {
    $this->current_dtr = null;
    $this->openDtr = false;
  }

}
