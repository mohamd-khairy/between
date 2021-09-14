<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DietResource extends JsonResource
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
            'photo' => display_img($this->image ? $this->image->photo : null),
            'days' => $this->days ?? null,
            'mealNumbers' => $this->mealNumbers ?? null,
        ];
    }
}
