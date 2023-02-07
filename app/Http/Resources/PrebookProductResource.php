<?php

namespace App\Http\Resources;

use App\Http\Resources\V1\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PrebookProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return [
            'id'        => $this->id,
            'qty'       => $this->qty,
            'price'     => $this->price,
            'product_name'   => $this->product->name,
            'product_attribute_name'   => $this->product_attribute->name,
            'image' => getImageUrl($this->product->image),
            'stock' => $this->product_attribute->quantity

            ];
    }
}
