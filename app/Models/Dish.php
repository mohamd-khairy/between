<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Dish extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $translatedAttributes = ['name'];
    public $with = ['translations', 'image'];

    public function gettranslatable()
    {
        return $this->translatedAttributes;
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'item_id', 'id')->where('model', 'App\Models\Dish');
    }
}
