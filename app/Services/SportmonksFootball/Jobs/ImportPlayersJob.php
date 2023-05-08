<?php

namespace App\Services\SportmonksFootball\Jobs;

use App\Models\Country;
use App\Models\Player;
use App\Services\SportmonksFootball\Collections\PlayerCollection;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ImportPlayersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private PlayerCollection $players;

    public function __construct(PlayerCollection $players)
    {
        $this->players = $players;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        foreach ($this->players as $player) {
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
