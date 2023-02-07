<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PreOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->load('preOrderProducts.productAttribute.product');
        return [
            'id'         => $this->id,
            'quantity'  => $this->quantity,
            'products'  => PreOrderProductResource::collection($this->preOrderProducts)
        ];
    }
}
