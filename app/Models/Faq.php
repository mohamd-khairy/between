<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Faq extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = [];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public $translatedAttributes = ['question', 'answer'];
    public $with = ['translations'];

    public function gettranslatable()
    {
        return $this->translatedAttributes;
    }
}
