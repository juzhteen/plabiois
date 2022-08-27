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
        "employee_type_employee_type_id",
        "resident_resident_id",
        "term_start",
        "term_end"
    ];
}
