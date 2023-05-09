<?php

namespace App\Http\Controllers;


use App\Models\Player;

class PlayerController extends Controller
{
    //
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $players = Player::query()->with('country')->paginate(10);

        return  view('players.index', ['players' => $players]);
    }
}
