<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DishResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'photo' => display_img($this->image ? $this->image->photo : null)
        ];

        return $data;
    }
}
