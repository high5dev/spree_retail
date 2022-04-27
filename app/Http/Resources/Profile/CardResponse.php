<?php

namespace App\Http\Resources\Profile;

use Illuminate\Http\Resources\Json\JsonResource;

class CardResponse extends JsonResource
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
            'name' => $this->name,
            'card_number' => $this->card_number,
            'exp_month' => $this->exp_month,
            'exp_year' => $this->exp_year,
            'created_at' => $this->created_at,
        ];
    }
}
