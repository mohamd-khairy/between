<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MealTypeResource extends JsonResource
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
            'main_type' =>   new GeneralResource($this->main_type),
            'photo' => display_img($this->image ? $this->image->photo : null),
        ];
    }
}
