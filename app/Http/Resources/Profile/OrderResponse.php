<?php

namespace App\Http\Resources\Profile;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResponse extends JsonResource
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
            'user_address' => $this->user_address,
            'total' => $this->billing_total,
            'tax' => $this->billing_tax,
            'status' => $this->status,
            'payment_status' => $this->payment_status,
            'fedex_delivery' => $this->fedex_delivery,
            'fedex_price' => $this->fedex_price,
            'fedex_tracking_id' => $this->fedex_tracking_id,
            'created_at' => $this->created_at,
        ];
    }
}
