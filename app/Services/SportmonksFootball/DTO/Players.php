<?php

namespace App\Services\SportmonksFootball\DTO;

use App\Services\SportmonksFootball\Collections\PlayerCollection;

class Players {

    public function __construct(
        public readonly PlayerCollection $data,
        public readonly Pagination $pagination,
    ){}

}
