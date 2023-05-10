<?php

namespace App\Services\SportmonksFootball\Jobs;

use App\Models\Country;
use App\Models\Player;
use App\Services\SportmonksFootball\Client;
use App\Services\SportmonksFootball\Collections\PlayerCollection;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportPlayersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private int $page;

    public function __construct(int $page = 1)
    {
        $this->page = $page;
    }

    /**
     * Execute the job.
     */
    public function handle(Client $client)
    {
        $players = $client->getPlayers($this->page);

        foreach ($players->data as $player) {
            $country = Country::query()->updateOrCreate(
                [
                    'api_id' => $player->country->apiId,
                ],
                [
                    'api_id' => $player->country->apiId,
                    'name' =>  $player->country->name,
                    'image_path' =>  $player->country->imagePath,
                ]
            );
            Player::query()->updateOrCreate(
                [
                    'api_id' => $player->apiId,
                ],
                [
                    'api_id' => $player->apiId,
                    'first_name' => $player->firstName,
                    'last_name' => $player->lastName,
                    'display_name' => $player->displayName,
                    'image_path' => $player->imagePath,
                    'gender' => $player->gender,
                    'date_of_birth' => $player->dateOfBirth,
                    'position' => $player->position,
                    'country_id' => $country->id,
                ]
            );
        }

        if ($players->pagination->hasMore) {
            $nextPage = $this->page + 1;
            $requestsPerHour = config('services.sportmonks-football.max-requests-per-hour');
            $secondsPerHour = 3600;
            $waitTime = $secondsPerHour / $requestsPerHour;

            // Wait for the calculated time before dispatching the next job to avoid hitting rate limit
            usleep($waitTime * 1000000); // Multiply by 1,000,000 to convert seconds to microseconds

            self::dispatch($nextPage);
        }
    }
}
