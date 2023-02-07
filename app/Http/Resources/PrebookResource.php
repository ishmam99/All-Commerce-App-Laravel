<?php

namespace App\Http\Resources;

use App\Http\Resources\V1\AddressResource;
use App\Http\Resources\V1\StoreResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PrebookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->load('prebookProducts.product', 'prebookProducts.product_attribute','address','store');
        return [
            'id'        => $this->id,
            'address'   => AddressResource::make($this->address),
            'store'     => StoreResource::make($this->store),
            'total'     => $this->total,
            'order_status'=> $this->order_status,
            'shipping_cost' => $this->shipping_cost,
            'products'  => PrebookProductResource::collection($this->prebookProducts)
        ];
    }
}
