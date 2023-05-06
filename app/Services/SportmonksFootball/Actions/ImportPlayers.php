<?php
namespace App\Services\SportmonksFootball\Actions;

use App\Models\Country;
use App\Models\Player;
use App\Services\SportmonksFootball\Client;

class ImportPlayers
{
    public function handle(Client $client)
    {

        //loop through while there are pages left to loop through
        //maintain page number
        //do not exceed rate limit.

        foreach ($client->getPlayers() as $player) {

            //country api id
            $county = Country::query()->updateOrCreate();
            //play api id
            $player = Player::query()->updateOrCreate();

        }
    }
}

