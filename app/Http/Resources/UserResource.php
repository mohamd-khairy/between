<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "id" =>  $this->id ?? null,
            "name" =>  $this->name ?? null,
            "email" =>  $this->email ?? null,
            "phone" =>  $this->phone ?? null,
            "type" =>  $this->type ?? null,
            "gender" =>  $this->gender ?? null,
            "weight" =>  $this->weight ?? null,
            "height" =>  $this->height ?? null,
            "birth_date" =>  $this->birth_date ?? null,
        ];
    }
}
