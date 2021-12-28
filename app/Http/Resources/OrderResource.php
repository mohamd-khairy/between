<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id ?? null,
            'package_value' => $this->package_value,
            'coupon_code' => $this->coupon_code,
            'coupon_discount' => $this->coupon_discount,
            'delivery_fees'=> $this->delivery_fees,
            'total'=> $this->total,
            'order_date' => $this->order_date ? date('Y-m-d', strtotime($this->order_date)) : null,
            'user' => $this->user ? new UserResource($this->user) : null,
            'status'=> status_object($this->status),
        ];
    }
}
