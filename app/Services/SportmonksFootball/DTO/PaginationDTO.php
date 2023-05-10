<?php

namespace App\Services\SportmonksFootball\DTO;

use Illuminate\Support\Collection;

class PaginationDTO {

    public function __construct(
        public readonly int $currentPage,
        public readonly bool $hasMore,
    ){}

}
