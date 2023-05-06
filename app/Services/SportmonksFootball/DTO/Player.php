<?php

namespace App\Services\SportmonksFootball\DTO;


use Illuminate\Support\Carbon;

class Player {

    public function __construct(
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $displayName,
        public readonly string $imagePath,
        public readonly string $gender,
        public readonly Carbon $dateOfBirth,
        public readonly ?string $position,
        public readonly Country $country,
    ){}

}
