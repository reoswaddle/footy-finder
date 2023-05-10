<?php

namespace App\Services\SportmonksFootball\Actions;

use App\Services\SportmonksFootball\Collections\PlayerCollection;
use App\Services\SportmonksFootball\DTO\PaginationDTO;
use App\Services\SportmonksFootball\DTO\PlayersDTO;

class CreatePlayersDTO
{
    public static function handle(\Illuminate\Http\Client\Response $response): PlayersDTO
    {
        $playerCollection = new PlayerCollection();

        foreach ($response->collect('data') as $item) {
            $player = CreatePlayerDTO::handle(
                item: $item,
            );
            $playerCollection->add(
                item: $player,
            );
        }

        return new PlayersDTO(
            data: $playerCollection,
            pagination:  new PaginationDTO(
                currentPage: $response->object()->pagination->current_page,
                hasMore: $response->object()->pagination->has_more,
            )
        );

    }
}
