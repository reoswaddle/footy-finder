<?php

namespace App\Services\SportmonksFootball\Actions;

use App\Services\SportmonksFootball\DTO\Country;
use App\Services\SportmonksFootball\DTO\Player;
use Illuminate\Support\Carbon;

class CreatePlayer
{
    public static function handle(array $item): Player
    {
        return new Player(
            firstName: $item['firstname'],
            lastName: $item['lastname'],
            displayName: $item['display_name'],
            imagePath: $item['image_path'],
            gender: $item['gender'],
            dateOfBirth: Carbon::parse($item['date_of_birth']),
            position: $item['position']['name'] ?? null,
            country: new Country(
                name: $item['country']['name'],
                imagePath: $item['country']['image_path']),
        );
    }
}
