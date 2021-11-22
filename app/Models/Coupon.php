<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'food_id',
        'start_date',
        'end_date',
        'type',
        'discount'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function food()
    {
        return $this->belongsTo(Food::class);
    }
}
