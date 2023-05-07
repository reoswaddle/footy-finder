<?php

namespace App\Services\SportmonksFootball;

use App\Services\SportmonksFootball\Actions\CreatePlayer;
use App\Services\SportmonksFootball\Actions\CreatePlayersResponse;
use App\Services\SportmonksFootball\Collections\PlayerCollection;
use App\Services\SportmonksFootball\DTO\Pagination;
use App\Services\SportmonksFootball\DTO\PlayerResponse;
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
    public function getPlayers(int $currentPage = 1): RequestException|PlayerResponse|null
    {
        $response = Http::get(
            url: "{$this->uri}/players",
            query: [
                'api_token' => $this->token,
                'include' => 'position;country;',
                'per_page' => 50,
                'current_page' => 1
            ]
        );

        if (! $response->successful()) {
            return $response->toException();
        }

        return CreatePlayersResponse::handle($response);
    }
}
