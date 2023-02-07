<?php

namespace App\Http\Resources\V1;

use App\Http\Resources\ProductAttributeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreProductResource extends JsonResource
{
    public function toArray($request): array
    {
        $store = $this->stores->first();
        $this->load('productAttributes', 'categories');
        return [
            'id' => $this->id,
            'name' => $this->name,
            'short_description' => $this->short_description,
            'full_description' => $this->full_description,
            'regular_price' => $this->regular_price,
            'sell_price' => $this->sell_price,
            'discount' => $this->discount ? $this->discount . '%' : null,
            'stock' => ($store->pivot->stock ?? 0) - ($store->pivot->stock_out ?? 0),
            'sku' => $this->sku,
            'image' => getImageUrl($this->image),
            'gallery' => $this->gallery,
            'created_at' => dateFormat($this->created_at),
            'is_in_wishlist' => $this->whenLoaded('wishlistUsers', $this->relationLoaded('wishlistUsers') && (bool)$this->wishlistUsers->first()),
            'category'  => CategoryResource::collection($this->categories),
            'attributes'    => ProductAttributeResource::collection($this->productAttributes)
        ];
    }
}
