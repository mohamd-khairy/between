<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealNumber extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'price',
        'diet_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'number' => 'integer',
    ];

    public function diet()
    {
        return $this->belongsTo(Diet::class);
    }
}
