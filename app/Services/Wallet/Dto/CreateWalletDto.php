<?php

namespace App\Services\Wallet\Dto;

class CreateWalletDto
{
    public string $name;
    public string $type;
    public int $userId;

    public function __construct(
        string $name,
        string $type,
        int $userId
    )
    {
        $this->name = $name;
        $this->type = $type;
        $this->userId = $userId;
    }
}
