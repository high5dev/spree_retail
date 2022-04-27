<?php

namespace App\Http\Resources\profile;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Profile\AddressResponse;

class AddressesResponse extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => AddressResponse::collection($this->collection),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
