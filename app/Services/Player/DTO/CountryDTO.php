<?php

namespace App\Services\Player\DTO;

class CountryDTO {

    public function __construct(
        public readonly ?string $name,
        public readonly ?string $imagePath
    ){}

}
