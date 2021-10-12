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
        $data =  [
            'id' => $this->id ?? null,
            'name' => $this->name ?? null,
            'photo' => display_img(isset($this->image) ? $this->image->photo : null),
        ];

        if (isset($this->main_type)) {
            $data['main_type'] =  isset($this->main_type) ?   new GeneralResource($this->main_type) : null;
        }

        return $data;
    }
}
