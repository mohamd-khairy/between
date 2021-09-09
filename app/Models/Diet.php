<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diet extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;


    protected $fillable = [
        'protein',
        'carb',
        'target_id',
        'price_for_meal'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $translatedAttributes = ['name'];

    public $with = ['image'];

    public function gettranslatable()
    {
        return $this->translatedAttributes;
    }

    public function target()
    {
        return $this->belongsTo(Target::class);
    }

    public function days()
    {
        return $this->hasMany(DayNumber::class);
    }

    public function mealNumbers()
    {
        return $this->hasMany(MealNumber::class);
    }


    public function image()
    {
        return $this->hasOne(Image::class, 'item_id', 'id')->where('model', 'App\Models\Diet');
    }
}
