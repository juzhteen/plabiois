<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;

    protected $primaryKey = "document_id";

    protected $fillable = [
        "document_id",
        "title",
        "description",
        "user_id"
    ];

    public function uploader()
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}