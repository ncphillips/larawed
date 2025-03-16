<?php

namespace Database\Seeders;

use App\Data\GuestSheetData;
use App\Models\Guest;
use App\Models\Invitation;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * @var Collection<GuestSheetData> $rows
         */
        $rows = [
            ['mushroom-glove', 'Brent', 'Mitton', 'bm@dude.com'],
            ['mushroom-glove', 'Jess', 'Compagnon', ''],
        ];

        foreach ($rows as $row) {
            $invitation_slug = $row[0];
            $first_name = $row[1];
            $last_name = $row[2];
            $email = $row[3];

            $invitation = Invitation::firstOrCreate([
                'slug' => $invitation_slug
            ]);

            $guest = Guest::updateOrInsert([
                'first_name' => $first_name,
                'last_name' => $last_name,
            ], [
                'invitation_id' => $invitation->id,
                'email' => $email
            ]);

        }
    }
}
