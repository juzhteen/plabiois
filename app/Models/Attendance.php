<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $primaryKey = "attendance_id";

    protected $fillable = [
        "attendance_id",
        "employee_employee_id",
        "time_in",
        "date_in"
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class, "employee_id", "employee_employee_id");
    }

}
