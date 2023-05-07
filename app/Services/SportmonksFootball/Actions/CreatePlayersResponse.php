<?php

namespace App\Services\SportmonksFootball\Actions;

use App\Services\SportmonksFootball\Collections\PlayerCollection;
use App\Services\SportmonksFootball\DTO\Pagination;
use App\Services\SportmonksFootball\DTO\PlayerResponse;

class CreatePlayersResponse
{
    public static function handle(\Illuminate\Http\Client\Response $response): PlayerResponse
    {
        $playerCollection = new PlayerCollection();

        foreach ($response->collect('data') as $item) {
            $player = CreatePlayer::handle(
                item: $item,
            );
            $playerCollection->add(
                item: $player,
            );
        }

        return new PlayerResponse(
            data: $playerCollection,
            pagination:  new Pagination(
                currentPage: $response->object()->pagination->current_page,
                hasMore: $response->object()->pagination->has_more,
            )
        );

    }
}