<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MainTypeResource extends JsonResource
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
            'meal_types' =>  GeneralResource::collection($this->meal_types),
            'photo' => display_img($this->image ? $this->image->photo : null),
        ];
    }
}
