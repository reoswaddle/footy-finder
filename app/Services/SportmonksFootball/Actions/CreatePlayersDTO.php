<?php

namespace App\Services\SportmonksFootball\Actions;

use App\Services\SportmonksFootball\DTO\PaginationDTO;
use App\Services\SportmonksFootball\DTO\PlayersDTO;

class CreatePlayersDTO
{
    public static function handle(\Illuminate\Http\Client\Response $response): PlayersDTO
    {
        $playersData = $response->collect('data');
        $playerCollection = $playersData->map(function ($item) {
            return CreatePlayerDTO::handle(item: $item);
        });

        $pagination = $response->object()->pagination;

        return new PlayersDTO(
            data: $playerCollection,
            pagination:  new PaginationDTO(
                currentPage: $pagination->current_page,
                hasMore: $pagination->has_more,
            )
        );
    }
}
