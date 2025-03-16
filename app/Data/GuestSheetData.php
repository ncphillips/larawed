<?php

namespace App\Data;

use Spatie\LaravelData\Data;

class GuestSheetData extends Data
{
    public function __construct(
        public string $invitation,
        public string $first_name,
        public string $last_name,
        public string $attending,
        public string $email,
    ) {}
}
