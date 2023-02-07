<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrebookDate extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public function prebookProducts()
    {
        return $this->hasMany(PrebookProduct::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function address()
    {
        return $this->belongsTo(Address::class,'address_id');
    }
    public function store()
    {
        return $this->belongsTo(Store::class,'store_id');
    }
}
