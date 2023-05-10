<?php

namespace App\Services\Player\Actions;

use App\Models\Player;
use App\Services\Player\DTO\PlayerDTO;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CreatePlayerDTO
{
    public static function handle(Player $player): PlayerDTO
    {
        $dateOfBirth = Carbon::parse($player->date_of_birth);

        return new PlayerDTO(
            id: $player->id,
            firstName: $player->first_name,
            lastName: $player->last_name,
            displayName: $player->display_name ?? "$player->first_name $player->last_name",
            imagePath: $player->image_path,
            gender: Str::ucfirst($player->gender),
            birthday: $dateOfBirth->format('d F Y'),
            age: $dateOfBirth->diff(now())->format('%y'),
            position: $player->position ?? null,
            country: CreateCountryDTO::handle($player->country)
        );
    }
}
