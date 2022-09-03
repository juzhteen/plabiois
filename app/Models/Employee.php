<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $primaryKey = "employee_id";

    protected $fillable = [
        "employee_id",
        "resident_id",
        "employee_type_id",
        "term_start",
        "term_end",
        "employee_code"
    ];

    public function resident()
    {
        return $this->hasOne(Resident::class, "resident_id", "resident_id");
    }

    public function employee_type()
    {
        return $this->hasOne(EmployeeType::class, "employee_type_id", "employee_type_id");
    }
}
