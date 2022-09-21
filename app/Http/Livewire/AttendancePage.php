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

    public function render()
    {
      $attendances = Attendance::whereDate("created_at", Carbon::today())->paginate(10);
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

        $latest_attendance = Attendance::where('employee_employee_id', $employee->employee_id)->whereDate('created_at', today())->first();

        if($latest_attendance){
          // Create carbon object for latest attendance
          $latest_attendance_carbon = Carbon::createFromFormat('Y-m-d H:i:s',  $latest_attendance->time_in);
             // Check if date of latest record matches today's date
             if($latest_attendance_carbon->toDateString() == $currentDate){
              if($this->attendance_type == 'time_out'){
                $latest_attendance->time_out = $currentDateTime;
                $latest_attendance->save();
                $this->dispatchBrowserEvent("attendance_out");
                $this->attendance_saved = true;
              }
            }else{
             $this->attendance_saved = true;
            }
        }else{
          Attendance::updateOrCreate(
            ["attendance_id" => $this->attendance_id],
            [
                "employee_employee_id" => $employee->employee_id,
                "time_in" => $currentDateTime
            ]
          );
          $this->dispatchBrowserEvent("attendance_in");
           $this->attendance_saved = true;
        }
      }
    }
}
