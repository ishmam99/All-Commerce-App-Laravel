<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreOrderProducts extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function productAttribute()
    {   
        return $this->belongsTo(ProductAttribute::class,'product_attribute_id');
    }
    public function preOrder()
    {   
        return $this->belongsTo(PreOrder::class,'pre_order_id');
    }
}
