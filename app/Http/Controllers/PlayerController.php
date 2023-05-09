<?php

namespace App\Http\Controllers;


use App\Models\Player;
use App\Services\Player\Actions\CreatePlayerDTO;

class PlayerController extends Controller
{
    //
    public function index()
    {
        $players = Player::query()->with('country')->paginate(10);

        return  view('players.index', [
            'players' => $players->setCollection(
                $players->getCollection()->map(function (Player $player) {
                    return  CreatePlayerDTO::handle($player);
                })
            )
        ]);
    }
}
