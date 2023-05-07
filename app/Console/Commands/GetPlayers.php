<?php

namespace App\Console\Commands;

use App\Services\SportmonksFootball\Client;
use Illuminate\Console\Command;

class GetPlayers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-players';

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
        //
        dump($client->getPlayers());
    }
}
