<?php
namespace App\Services\SportmonksFootball\Actions;

use App\Services\SportmonksFootball\Client;
use App\Services\SportmonksFootball\Jobs\ImportPlayersJob;

class ImportPlayers
{
    public function __invoke(Client $client)
    {
        $hasMorePages = true;
        $requestsPerHour = config('services.sportmonks-football.max-requests-per-hour');
        $secondsPerHour = 3600;
        $waitTime = $secondsPerHour / $requestsPerHour;
        $page = 1;

        while ($hasMorePages) {
            $players = $client->getPlayers($page);
            ImportPlayersJob::dispatch($players->data);

            $hasMorePages = $players->pagination->hasMore;
            $page++;

            if ($hasMorePages) {
                usleep($waitTime * 1000000); // Multiply by 1,000,000 to convert seconds to microseconds
            }
        }
    }
}

