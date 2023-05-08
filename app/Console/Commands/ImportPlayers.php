<?php

namespace App\Console\Commands;

use App\Services\SportmonksFootball\Client;
use Illuminate\Console\Command;

class ImportPlayers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-players';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(Client $client)
    {
        (new \App\Services\SportmonksFootball\Actions\ImportPlayers())->handle($client);

    }
}
