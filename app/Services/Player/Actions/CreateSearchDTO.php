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
            countryId: $request['country'],
            lastName: $request['last_name'],
            firstName: $request['first_name'],
        );
    }
}
