<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrebookProduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function prebook()
    {
        return $this->belongsTo(PrebookDate::class, 'prebook_date_id');

    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function product_attribute()
    {
        return $this->belongsTo(ProductAttribute::class,'product_attribute_id');
    }
}
