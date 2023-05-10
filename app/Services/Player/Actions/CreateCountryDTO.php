<?php

namespace App\Services\Player\Actions;

use App\Models\Country;
use App\Services\Player\DTO\CountryDTO;
class CreateCountryDTO
{
    public static function handle(Country $country): CountryDTO
    {
        return new CountryDTO(
            id: $country->id,
            name: $country->name,
            imagePath: $country->image_path
        );
    }
}
