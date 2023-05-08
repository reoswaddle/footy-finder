<?php
namespace App\Services\SportmonksFootball\Actions;

use App\Models\Country;
use App\Models\Player;
use App\Services\SportmonksFootball\Client;

class ImportPlayers
{
    public function handle(Client $client)
    {
        $hasMorePages = true;
        $waitTime = config('services.sportmonks-football.max-requests-per-hour') / 3600; //3600 = 1 hour in seconds
        $page = 1;
        while($hasMorePages) {
            $players = $client->getPlayers($page);
            $this->save($players);
            $hasMorePages = $players->pagination->hasMore;
            // Wait for the calculated time before making the next request
            usleep($waitTime * 1000000); // Multiply by 1,000,000 to convert seconds to microseconds
            $page++;
        }
    }

    protected function save($players){
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
    }
}

