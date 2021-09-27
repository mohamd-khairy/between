<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FoodResource extends JsonResource
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
            'name' => $this->name ?? null,
            'protein' => $this->protein ?? null,
            'carb' => $this->carb ?? null,
            'fats' => $this->fats ?? null,
            'calories' => $this->calories ?? null,
            'weight' => $this->weight ?? null,
            'price' => $this->price ?? null,
            'photo' => display_img($this->image ? $this->image->photo : null),
            'meal_types' => $this->mealtypes ? MealTypeResource::collection($this->mealtypes) : null,
            'status' => $this->status ? True : false
        ];
    }
}
