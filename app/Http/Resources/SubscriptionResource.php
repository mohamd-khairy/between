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
            'ingredient_ids' => $this->ingredient_ids ?? null,
            'protien_ids' => $this->protien_ids ?? null,
            'snack_ids' => $this->snack_ids ?? null,
            'carb_ids' => $this->carb_ids ?? null,
            'user_id' => $this->user_id ?? null,
            'target_id' => $this->target_id ?? null,
            'meal_number_id' => $this->meal_number_id ?? null,
            'prefered_time_id' => $this->prefered_time_id ?? null,
            'dish_id' => $this->dish_id ?? null,
            'food_id' => $this->food_id ?? null,
            'address_id' => $this->address_id ?? null,
            'start_date' => $this->start_date ?? null,
            'end_date' => $this->end_date ?? null,
            'user' => $this->user ?? null,
            'target' => $this->target ?? null,
            'meal_number' => $this->meal_number ?? null,
            'prefered_time' => $this->prefered_time ?? null,
            'dish' => $this->dish ?? null,
            'food' => $this->food ?? null,
            'address' => $this->address ?? null,
        ];
    }
}
