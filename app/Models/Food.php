<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Food extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;

    protected $fillable = [
        'protein',
        'carb',
        'fats',
        'main_type_id',
        'price',
        'weight',
        'calories'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $translatedAttributes = ['name', 'details'];

    public $with = ['image'];

    public function gettranslatable()
    {
        return $this->translatedAttributes;
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'item_id', 'id')->where('model', 'App\Models\Food');
    }

    public function main_type()
    {
        return $this->belongsTo(MealType::class, 'main_type_id', 'id')->where('parent', 1);
    }

    public function mealtypes()
    {
        return $this->belongsToMany(MealType::class, 'food_meal_types', 'food_id', 'meal_type_id');
    }

    public function mealtypes_many()
    {
        return $this->hasMany(FoodMealType::class)->with('meal_type');
    }

    public function foodtypes_many()
    {
        return $this->hasMany(FoodType::class)->with('dish');
    }
}
