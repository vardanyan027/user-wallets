<?php

namespace App\Services\Wallet\Actions;

use App\Models\Wallets;
use App\Services\Wallet\Dto\CreateWalletDto;

class CreateWalletAction
{
    public function run(CreateWalletDto $createWalletDto): Wallets
    {
        $wallet = Wallets::staticCreate($createWalletDto);
        $wallet->save();
        return $wallet;
    }
}
