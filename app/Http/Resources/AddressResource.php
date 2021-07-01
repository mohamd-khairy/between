<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'country' => $this->country ?? null,
            'state' => $this->state ?? null,
            'district' => $this->district ?? null,
            'street' => $this->street ?? null,
            'full_address' => $this->full_address ?? null,
            'building' => $this->building ?? null,
            'floor' => $this->floor ?? null,
            'apartment_number' => $this->apartment_number ?? null,
            'lat' => $this->lat ?? null,
            'long' => $this->long ?? null,
            'state_id' => $this->state_id ?? null,
            'user' => new UserResource($this->user) ?? null,
        ];
    }
}
