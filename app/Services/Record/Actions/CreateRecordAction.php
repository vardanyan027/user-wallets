<?php

namespace App\Services\Record\Actions;

use App\Models\Records;
use App\Models\Wallets;
use App\Services\Record\Dto\CreateRecordDto;
use Exception;

class CreateRecordAction
{
    /**
     * @throws Exception
     */
    public function run(CreateRecordDto $createRecordDto): Records
    {
        $record = Records::staticCreate($createRecordDto);
        $record->save();
        $wallet = Wallets::where('id', $record->getWalletId())->first();
        if ($record->getType() == 'credit') {
            $amount = $wallet->getTotalAmount() + $record->getAmount();
        } else {
            $amount = $wallet->getTotalAmount() - $record->getAmount();
        }
        if ($amount < 0) {
            throw new Exception('Record not created, because wallet amount is low');
        }
        $wallet->save();
        return $record;
    }

}
