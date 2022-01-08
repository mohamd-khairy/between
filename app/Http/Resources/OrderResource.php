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
            'order_number' => $this->order_number ?? null,
            'package_value' => $this->package_value ?? 0,
            'coupon_code' => $this->coupon_code ?? 0,
            'coupon_discount' => $this->coupon_discount ?? 0,
            'delivery_fees' => $this->delivery_fees ?? 0,
            'total' => $this->total ?? 0,
            'order_date' => $this->order_date ? date('Y-m-d', strtotime($this->order_date)) : null,
            'user' => $this->user ? new UserResource($this->user) : null,
            'status'=> status_object($this->status),
        ];
    }
}
