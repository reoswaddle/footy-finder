<?php

namespace App\Services\Player\DTO;

use App\Services\Player\DTO\CountryDTO;

class PlayerDTO {

    public function __construct(
        public readonly int $id,
        public readonly ?string $firstName,
        public readonly ?string $lastName,
        public readonly ?string $displayName,
        public readonly ?string $imagePath,
        public readonly ?string $gender,
        public readonly ?string $birthday,
        public readonly ?int $age,
        public readonly ?string $position,
        public readonly ?CountryDTO $country,
    ){}

}
