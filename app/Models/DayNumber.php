<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'number'
    ];
}
