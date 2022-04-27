<?php

namespace App\Http\Resources\Banner;

use App\Http\Resources\Banner\BannerResponse;
use Illuminate\Http\Resources\Json\JsonResource;

class BannersResponse extends JsonResource
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
            'data' => BannerResponse::collection($this)
        ];
    }
}
