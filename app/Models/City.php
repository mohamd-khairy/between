<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class City extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = ['state_id'];

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

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
