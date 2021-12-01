<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'ingredient_ids',
        'protien_ids',
        'snack_ids',
        'carb_ids',
        'user_id',
        'target_id',
        'meal_number_id',
        'prefered_time_id',
        'dish_id',
        'food_id',
        'address_id',
        'start_date',
        'end_date'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function target()
    {
        return $this->belongsTo(Target::class);
    }

    public function meal_number()
    {
        return $this->belongsTo(MealNumber::class);
    }

    public function prefered_time()
    {
        return $this->belongsTo(PreferedTime::class);
    }

    public function dish()
    {
        return $this->belongsTo(Dish::class);
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function setIngredientIdsAttribute($value)
    {
        $this->attributes['ingredient_ids'] = $value ? json_encode($value) : [];
    }

    public function setProtienIdsAttribute($value)
    {
        $this->attributes['protien_ids'] = $value ? json_encode($value) : [];
    }

    public function setSnackIdsAttribute($value)
    {
        $this->attributes['snack_ids'] = $value ? json_encode($value) : [];
    }

    public function setCarbIdsAttribute($value)
    {
        $this->attributes['carb_ids'] = $value ? json_encode($value) : [];
    }
}
