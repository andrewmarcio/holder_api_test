<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        "initial_date",
        "initial_hour",
        "final_date",
        "final_hour",
        "description"
    ];

}
