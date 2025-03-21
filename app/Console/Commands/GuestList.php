<?php

namespace App\Console\Commands;

use App\Models\Guest;
use App\Models\Invitation;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use League\Csv\Reader;

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
    protected $description = 'Update the guest list from the CSV file';

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

        $csv = Reader::createFromPath(base_path('data/guests.csv'), 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            $invitation = Invitation::firstOrCreate([
                'slug' => $record['invitation_slug']
            ]);

            Guest::updateOrInsert([
                'first_name' => $record['first_name'],
                'last_name' => $record['last_name'],
            ], [
                'invitation_id' => $invitation->id,
                'email' => $record['email']
            ]);
        }

        $this->info('Guest list updated successfully!');
    }
}
