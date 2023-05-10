<?php

namespace App\Services\SportmonksFootball\Actions;

use App\Services\SportmonksFootball\DTO\CountryDTO;
use App\Services\SportmonksFootball\DTO\PlayerDTO;
use Illuminate\Support\Carbon;

class CreatePlayerDTO
{
    public static function handle(array $item): PlayerDTO
    {
        return new PlayerDTO(
            apiId: $item['id'],
            firstName: $item['firstname'],
            lastName: $item['lastname'],
            displayName: $item['display_name'],
            imagePath: $item['image_path'],
            gender: $item['gender'],
            dateOfBirth: Carbon::parse($item['date_of_birth']),
            position: $item['position']['name'] ?? null,
            country: new CountryDTO(
                apiId: $item['country']['id'],
                name: $item['country']['name'],
                imagePath: $item['country']['image_path']),
        );
    }
}
