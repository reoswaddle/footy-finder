<?php

namespace App\Services\Player\Actions;

use App\Models\Player;
use App\Services\Player\DTO\PlayerDTO;
use App\Services\Player\DTO\CountryDTO;
use App\Services\Player\DTO\SearchDTO;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class CreateSearchDTO
{
    public static function handle(array $request): SearchDTO
    {
        return new SearchDTO(
            countryId: $request['country'] ?? null,
            lastName: $request['last_name'] ?? null,
            firstName: $request['first_name'] ?? null,
        );
    }
}
