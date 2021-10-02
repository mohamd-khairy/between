<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Address extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'user_id',
        'state_id',
        'building',
        'floor',
        'apartment_number',
        'lat',
        'long',
        'type',
    ];

    public $translatedAttributes = ['country', 'state', 'district', 'street', 'full_address'];
    public $with = ['translations'];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function gettranslatable()
    {
        return $this->translatedAttributes;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
