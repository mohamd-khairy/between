<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreferedTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'from',
        'to'
    ];

    public $timestamps = false;


    public function getFromAttribute($v)
    {
        return $v ? date('h:i A' , strtotime($v)) : null;
    }

    public function getToAttribute($v)
    {
        return $v ? date('h:i A' , strtotime($v)) : null;
    }
}
