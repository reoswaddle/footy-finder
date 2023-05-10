<?php

namespace App\Services\SportmonksFootball;

use App\Services\SportmonksFootball\Actions\CreatePlayerDTO;
use App\Services\SportmonksFootball\Actions\CreatePlayersDTO;
use App\Services\SportmonksFootball\Collections\PlayerCollection;
use App\Services\SportmonksFootball\DTO\PaginationDTO;
use App\Services\SportmonksFootball\DTO\PlayersDTO;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class Client
{
    public function __construct(
        protected string $uri,
        protected string $token,
    ) {}


    /**
     * Gets players
     *
     */
    public function getPlayers(int $page = 1): RequestException|PlayersDTO|null
    {
        $response = Http::get(
            url: "{$this->uri}/players",
            query: [
                'api_token' => $this->token,
                'include' => 'position;country;',
                'per_page' => 50,
                'page' => $page
            ]
        );

        if (! $response->successful()) {
            return $response->toException();
        }

        return CreatePlayersDTO::handle($response);
    }
}
