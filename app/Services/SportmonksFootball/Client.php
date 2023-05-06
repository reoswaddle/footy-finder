<?php

namespace App\Services\SportmonksFootball;

use App\Services\SportmonksFootball\Actions\CreatePlayer;
use App\Services\SportmonksFootball\Collections\PlayerCollection;
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
     * @return RequestException|PlayerCollection|null
     */
    public function getPlayers(): RequestException|PlayerCollection|null
    {
        $response = Http::get(
            url: "{$this->uri}/players",
            query: [
                'api_token' => $this->token,
                'include' => 'position;country;'
            ]
        );

        $collection = new PlayerCollection();
        foreach ($response->collect('data') as $item) {
            $player = CreatePlayer::handle(
                item: $item,
            );
            $collection->add(
                item: $player,
            );
        }

        if (! $response->successful()) {
            return $response->toException();
        }

        return $collection;
    }
}
