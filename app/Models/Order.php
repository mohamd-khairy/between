<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'user_id',
        'address_id',
        'order_date',
        'package_value',
        'coupon_code',
        'coupon_discount',
        'delivery_fees',
        'total',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $o = Order::orderBy('id', 'desc')->first();
            if ($o && $o->order_number) {
                $model->order_number =   $o->order_number + 1;
            } else {
                $model->order_number =  date('y') . '000001';
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
