<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guest extends Model
{
    /** @use HasFactory<\Database\Factories\GuestFactory> */
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'guest_id',
    ];

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class);
    }
}
