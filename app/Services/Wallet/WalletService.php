<?php

namespace App\Services\Wallet;

use App\Models\Wallets;

class WalletService
{
    public function delete(int $id): string
    {
        $wallet = Wallets::where('id', $id)->first();
        $wallet->records()->delete();
        $wallet->delete();
        return 'Deleted';
    }

}
