<?php

namespace App\Services\SportmonksFootball\DTO;

use Illuminate\Support\Collection;

class PlayersDTO {

    public function __construct(
        public readonly Collection $data,
        public readonly PaginationDTO $pagination,
    ){}

}
