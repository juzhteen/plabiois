<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $primaryKey = "request_id";

    protected $fillable = [
        "request_id",
        "resident_resident_id",
        "form_form_id",
        "request_date",
        "expiration_date",
        "form_fields"
    ];

    public function resident()
    {
        return $this->hasOne(Resident::class, "resident_id", "resident_resident_id");
    }

    public function form()
    {
        return $this->hasOne(Form::class, "form_id", "form_form_id");
    }

}
