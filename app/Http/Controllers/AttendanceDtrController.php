<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Attendance;
use App\Models\Employee;

class AttendanceDtrController extends Controller
{
    public function index($employee_id, $year, $month)
    {
      $employee_dtr_records = Attendance::where('employee_employee_id', '=', $employee_id)
        ->whereMonth('created_at', '=', $month)
        ->whereYear('created_at', '=', $year)
        ->get();

      $employee = Employee::findOrFail($employee_id);

        return view('livewire.attendance.attendance-dtr-preview', [
           'employee_dtr_records' => $employee_dtr_records,
           'month' => $month,
           'year' => $year,
           'current_dtr' => $employee_id,
           'employee' => $employee
        ]);
    }

    public function todays_attendance($year, $month, $day)
    {
      $employee_dtr_records = Attendance::join(
        "employees",
        "attendances.employee_employee_id",
        "=",
        "employees.employee_id"
      )
        ->whereMonth('attendances.created_at', '=', $month)
        ->whereYear('attendances.created_at', '=', $year)
        ->whereDay('attendances.created_at', '=', $day)
        ->get();

        // dd($employee_dtr_records);

        return view('livewire.attendance.daily-attendance-preview', [
          'employee_dtr_records' => $employee_dtr_records,
          'month' => $month,
          'year' => $year,
          'day' => $day
       ]);
    }
}
