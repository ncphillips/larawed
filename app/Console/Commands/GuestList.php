<?php

namespace App\Console\Commands;

use App\Data\GuestSheetData;
use App\Models\Guest;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Collection;

class GuestList extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'guests:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the guest list';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        User::updateOrInsert([
            'email' => 'hello@nolanphillips.com',
        ], [
            'name' => 'Nolan',
            'password' => Hash::make('blueberry'),
        ]);

        User::updateOrInsert([
            'email' => 'ecgormley3@gmail.com',
        ], [
            'name' => 'Ellen',
            'password' => Hash::make('blueberry'),
        ]);


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
