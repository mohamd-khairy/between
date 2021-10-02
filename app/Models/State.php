<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class State extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    
    public $translatedAttributes = ['name'];

    public $with = ['translations'];

    public function gettranslatable()
    {
        return $this->translatedAttributes;
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
