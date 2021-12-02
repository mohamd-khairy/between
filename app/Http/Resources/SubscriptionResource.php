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
            'package_value' => $this->package_value,
            'coupon_code' => $this->coupon_code,
            'coupon_discount' => $this->coupon_discount,
            'delivery_fees'=> $this->delivery_fees,
            'total'=> $this->total,
            'weight'=> $this->weight,
            'height'=> $this->height,
            'gender'=> $this->gender,
            'status'=> status_object($this->status),
            'start_date' => $this->start_date ? date('Y-m-d', strtotime($this->start_date)) : null,
            'end_date' => $this->end_date ? date('Y-m-d', strtotime($this->end_date)) :  null,
            'user' => $this->user ? new UserResource($this->user) : null,
            'meal_number' => $this->meal_number ?? null,
            'prefered_time' => $this->prefered_time ?? null,
        ];
    }
}
