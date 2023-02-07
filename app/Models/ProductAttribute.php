<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
     public function product()
     {
        return $this->belongsTo(Product::class,'product_id');
     }
     public function preOrderProducts()
     {
      return $this->hasMany(PreOrderProducts::class);
     }
     public function prebookProducts()
     {
      return $this->hasMany(PrebookProduct::class);
     }
}
