<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaticPage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'body_en',
        'body_ar'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
