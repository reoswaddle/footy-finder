<?php

namespace App\Services\SportmonksFootball\DTO;


class Country {

    public function __construct(
        public readonly int $apiId,
        public readonly ?string $name,
        public readonly ?string $imagePath
    ){}

}
