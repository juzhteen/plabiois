<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $primaryKey = "resident_id";

    protected $fillable = [
        "resident_id",
        "name",
        "age",
        "gender",
        "civil_status",
        "religion",
        "weight",
        "height",
        "purok"
    ];
}
