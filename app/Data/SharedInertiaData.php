<?php

namespace App\Data;

use App\Models\User;
use Spatie\LaravelData\Data;

/**
 * @typescript
 */
class SharedInertiaData extends Data
{
    public function __construct(
        public User|null $currentUser,
    )
    {
    }
}
