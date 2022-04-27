<?php

namespace App\Http\Resources\Banner;

use Illuminate\Http\Resources\Json\JsonResource;

class BannerResponse extends JsonResource
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
            'url' => $this->url, 
            'type' => $this->type, 
            'image' => asset($this->image),
            'created_at' => $this->created_at, 
            'updated_at' => $this->updated_at
        ];
    }
}
