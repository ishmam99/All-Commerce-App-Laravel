<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProduct extends Model
{
    use HasFactory;

    protected $fillable =[
      'order_id',
      'product_id',
      'qty',
      'price',
      'discount_sell_price'
    ];
    public function product(): BelongsTo
    {
      return $this->belongsTo(Product::class);

    }
    public function order()
    {
      return $this->belongsTo(Order::class,'order_id');
    }
    
}
