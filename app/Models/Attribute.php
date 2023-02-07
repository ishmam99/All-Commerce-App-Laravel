<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use HasFactory;
    protected $guarded = [''];
    public function products() {
        return $this->belongsToMany(Product::class);
    }
    public function attributeValues() {
        return $this->hasMany(AttributeValue::class);
    }
}