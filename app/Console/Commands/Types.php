<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Types extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'types';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->call('typescript:transform', ['--format' => true]);
        $this->call('ziggy:generate');
    }
}
