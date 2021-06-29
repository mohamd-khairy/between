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

    public $translatedAttributes = ['name'];

    public function gettranslatable()
    {
        return $this->translatedAttributes;
    }
}
