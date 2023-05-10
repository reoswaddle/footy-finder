<?php

namespace App\Services\SportmonksFootball\DTO;

use App\Services\SportmonksFootball\Collections\PlayerCollection;

class PlayersDTO {

    public function __construct(
        public readonly PlayerCollection $data,
        public readonly PaginationDTO $pagination,
    ){}

}
