<?php

namespace App\Services\Record\Dto;

class CreateRecordDto
{
    public int $amount;
    public string $type;
    public int $walletId;

    public function __construct(
        int $amount,
        string $type,
        int $walletId,
    )
    {
        $this->amount = $amount;
        $this->type = $type;
        $this->walletId = $walletId;
    }
}
