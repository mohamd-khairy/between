<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodMealType extends Model
{
    use HasFactory;

    public $guarded = [];

    public $timestamps = false;

    public function meal_type()
    {
        return $this->belongsTo(MealType::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
