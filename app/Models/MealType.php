<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class MealType extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'parent',
        'parent_id'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    const MainTypes = [
        'protein' => 1,
        'carb' => 2,
        'snacks' => 3
    ];

    public $translatedAttributes = ['name'];
    public $with = ['image', 'translations'];

    public function gettranslatable()
    {
        return $this->translatedAttributes;
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'item_id', 'id')->where('model', 'App\Models\MealType');
    }

    public function main_type()
    {
        return $this->belongsTo(MealType::class, 'parent_id', 'id')->where('parent', 1);
    }

    public function meal_types()
    {
        return $this->hasMany(MealType::class, 'parent_id', 'id')->where('parent', 0);
    }
}
