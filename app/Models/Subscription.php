<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'ingredient_ids',
        'protien_ids',
        'snack_ids',
        'carb_ids',
        'user_id',
        'target_id',
        'meal_number_id',
        'day_number_id',
        'prefered_time_id',
        'dish_id',
        'diet_id',
        'address_id',
        'start_date',
        'end_date',
        'package_value',
        'coupon_code',
        'coupon_discount',
        'delivery_fees',
        'total',
        'weight',
        'height',
        'gender',
        'status',
        'payment_method_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $appends = ['ingredient_name', 'proteins_name', 'carbs_name', 'snacks_name'];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $o = Subscription::orderBy('id', 'desc')->first();
            if ($o && $o->order_number) {
                $model->order_number =  $o->order_number + 1;
            } else {
                $model->order_number =  date('y') . '000001';
            }
        });
    }

    public function paymentmethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

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

    public function diet()
    {
        return $this->belongsTo(Diet::class);
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

    public function getIngredientNameAttribute()
    {
        if ($this->ingredient_ids) {
            return  Ingredient::whereIn('id', (array)json_decode($this->ingredient_ids))->get()->pluck('name');
        }
    }

    public function getProteinsNameAttribute()
    {
        if ($this->protien_ids) {
            return  MealType::whereIn('id', (array)json_decode($this->protien_ids))->get()->pluck('name');
        }
    }

    public function getCarbsNameAttribute()
    {
        if ($this->carb_ids) {
            return  MealType::whereIn('id', (array)json_decode($this->carb_ids))->get()->pluck('name');
        }
    }

    public function getSnacksNameAttribute()
    {
        if ($this->snack_ids) {
            return  MealType::whereIn('id', (array)json_decode($this->snack_ids))->get()->pluck('name');
        }
    }

    // 'proteins' => MealType::where('parent_id', MealType::MainTypes['protein'])->get(),
    // 'carbs' => MealType::where('parent_id', MealType::MainTypes['carb'])->get(),
    // 'snacks' => MealType::where('parent_id', MealType::MainTypes['snacks'])->get(),
}
