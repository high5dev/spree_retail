<?php

namespace App\Http\Resources\Profile;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrdersResponse extends ResourceCollection
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
            'data' => OrderResponse::collection($this->collection),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
