<?php

namespace App\Http\Resources\Profile;

use Illuminate\Http\Resources\Json\ResourceCollection;

class OrderProductsResponse extends ResourceCollection
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
            'data' => OrderProductResponse::collection($this->collection),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
