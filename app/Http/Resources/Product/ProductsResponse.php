<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\ProductResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductsResponse extends ResourceCollection
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
            'data' => ProductResponse::collection($this->collection),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
