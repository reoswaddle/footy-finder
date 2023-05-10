<?php

namespace App\Http\Controllers;


use App\Models\Country;
use App\Models\Player;
use App\Services\Player\Actions\CreateCountryDTO;
use App\Services\Player\Actions\CreatePlayerDTO;

class PlayerController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $players = Player::query()
            ->with('country')
            ->orderBy('last_name')
            ->paginate(10);

        // Replace collection of LengthAwarePaginator class with DTO Player instances
        $players = $players->setCollection(
            $players->getCollection()->map(function (Player $player) {
                return  CreatePlayerDTO::handle($player);
            })
        );

        // Get list of countries for player search component
        $countries = Country::query()->distinct()->orderBy('name')->get()->map(function (Country $country) {
            return  CreateCountryDTO::handle($country);
        });

        return  view('players.index', [
            'players' => $players,
            'countries' => $countries
        ]);
    }

    public function show(Player $player): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return  view('players.show', [
            'player' => CreatePlayerDTO::handle($player)
        ]);
    }
}
