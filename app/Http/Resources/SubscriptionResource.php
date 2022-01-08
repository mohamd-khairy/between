<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionResource extends JsonResource
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
            'coupon_code' => $this->coupon_code ?? null,
            'coupon_discount' => $this->coupon_discount ?? 0,
            'delivery_fees' => $this->delivery_fees ?? 0,
            'total' => $this->total ?? 0,
            'weight' => $this->weight ?? null,
            'height' => $this->height ?? null,
            'gender' => $this->gender ?? null,
            'status' => status_object($this->status) ?? null,
            'start_date' => $this->start_date ? date('Y-m-d', strtotime($this->start_date)) : null,
            'end_date' => $this->end_date ? date('Y-m-d', strtotime($this->end_date)) :  null,
            'user' => $this->user ? new UserResource($this->user) : null,
            'meal_number' => $this->meal_number ?? null,
            'prefered_time' => $this->prefered_time ?? null,
        ];
    }
}
