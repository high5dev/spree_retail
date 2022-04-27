<?php

namespace App\Http\Resources\Cart;

use App\Http\Resources\Profile\AddressResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResponse extends JsonResource
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
            'data' => ItemsResponse::collection($this->collection),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
