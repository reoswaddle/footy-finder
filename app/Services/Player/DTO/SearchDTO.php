<?php

namespace App\Services\Player\DTO;

use App\Services\Player\DTO\CountryDTO;

class SearchDTO {

    public function __construct(
        public readonly ?int $countryId,
        public readonly ?string $lastName,
        public readonly ?string $firstName,
    ){}

}
