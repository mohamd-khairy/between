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
        'target_id'
    ];

    public $translatedAttributes = ['name'];

    public function gettranslatable()
    {
        return $this->translatedAttributes;
    }

    public function target()
    {
        return $this->belongsTo(Target::class);
    }
}
