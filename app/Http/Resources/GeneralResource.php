<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GeneralResource extends JsonResource
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
        ];

        if ($this->image) {
            $data['photo'] = display_img($this->image ? $this->image->photo : null);
        }

        return $data;
    }
}
