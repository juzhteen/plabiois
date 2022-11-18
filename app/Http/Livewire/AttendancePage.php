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

class AttendancePage extends Component
{
    use WithPagination;

    protected $listeners = [
        'save_attendance'
  ];

    public $qr_data, $attendance_id = "";
    public $employee;
    public $attendance_saved = false;
    public $attendance_type = 'time_in';
    public $attendance_date;
    public $year_query, $month_query, $day_query;

    public function mount()
    {
      $this->attendance_date = Carbon::today();
      
      $this->day_query = Carbon::now()->day;
      $this->month_query = Carbon::now()->month;
      $this->year_query = Carbon::now()->year;
    }

    public function render()
    {
      $attendances = Attendance::join(
          "employees",
          "attendances.employee_employee_id",
          "=",
          "employees.employee_id"
        )
        ->whereDate("attendances.created_at", $this->attendance_date)->get();

        if($this->attendance_date){
          $this->year_query = explode("-", $this->attendance_date)[0];
          $this->month_query = explode("-", $this->attendance_date)[1];
          $this->day_query = explode("-", $this->attendance_date)[2];
        }

      return view('livewire.attendance.attendance-page', ["attendances" => $attendances]);
    }

    public function save_attendance($data)
    {
      $this->qr_data = $data;
      $employee = Employee::where("employee_code", $this->qr_data)->first();
      $this->employee = $employee;

      $carbonDateTime = Carbon::now();
      $currentDateTime = $carbonDateTime->toDateTimeString();
      $currentDate = $carbonDateTime->toDateString();

      if($employee){

        if($this->attendance_type == "time_in"){

          $latest_attendance_in = Attendance::where('employee_employee_id', $employee->employee_id)->whereDate('created_at', today())->first();

          if($latest_attendance_in){
            if($latest_attendance_in->time_in){
              $this->dispatchBrowserEvent("attendance_in_exists");
            } else if ($latest_attendance_in->time_out) {
              $this->dispatchBrowserEvent("attendance_closed");
            }
          } else {
            $attendance_in = new Attendance;
            $attendance_in->employee_employee_id = $employee->employee_id;
            $attendance_in->time_in = $currentDateTime;
            $attendance_in->save();
  
            $this->dispatchBrowserEvent("attendance_in");
             $this->attendance_saved = true;
          }

        }

        if($this->attendance_type == "time_out"){

          $latest_attendance_out = Attendance::where('employee_employee_id', $employee->employee_id)->whereDate('created_at', today())->first();

          if($latest_attendance_out){
            if($latest_attendance_out->time_out){
              $this->dispatchBrowserEvent("attendance_out_exists");
            } else {
              if($latest_attendance_out->time_in){
                $latest_attendance_out->time_out = $currentDateTime;
                $latest_attendance_out->save();

                $this->dispatchBrowserEvent("attendance_out");
                $this->attendance_saved = true;
              }
            }
          }else{
            $attendance_in = new Attendance;
            $attendance_in->employee_employee_id = $employee->employee_id;
            $attendance_in->time_out = $currentDateTime;
            $attendance_in->save();
  
            $this->dispatchBrowserEvent("attendance_out");
            $this->attendance_saved = true;
          }
          
        }
      }
    }

    public function reset_date()
    {
      $this->attendance_date = Carbon::today();
    }
}
