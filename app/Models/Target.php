<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Target extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use SoftDeletes;

    protected $fillable = [];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public $translatedAttributes = ['name'];
    public $with = ['translations','image'];
    
    public function gettranslatable()
    {
        return $this->translatedAttributes;
    }

    public function diets()
    {
        return $this->hasMany(Diet::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class, 'item_id', 'id')->where('model', 'App\Models\Target');
    }
}
