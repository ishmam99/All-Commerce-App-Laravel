<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Usertype extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }
}
