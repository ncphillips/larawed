<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invitation extends Model
{
    protected $fillable = [
        'slug',
    ];

    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class);
    }
}
