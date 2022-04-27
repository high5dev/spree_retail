<?php

namespace App\Http\Resources\Profile;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResponse extends JsonResource
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
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'app_address' => $this->app_address,
            'city' => $this->city,
            'region' => $this->region,
            'zipcode' => $this->zipcode,
            'country' => $this->country,
            'created_at' => $this->created_at,
        ];
    }
}
