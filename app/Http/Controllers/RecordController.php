<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRecordRegister;
use App\Models\Records;
use App\Services\Record\Actions\CreateRecordAction;
use App\Services\Record\Dto\CreateRecordDto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    private CreateRecordAction $createRecordAction;

    public function __construct(CreateRecordAction $createRecordAction)
    {
        $this->createRecordAction = $createRecordAction;
    }

    /**
     * @throws \Exception
     */
    public function store(CreateRecordRegister $createRecordRegister): RedirectResponse
    {
        $createRecordDto = new CreateRecordDto(
            $createRecordRegister->getAmount(),
            $createRecordRegister->getType(),
            $createRecordRegister->getWalletId(),
        );
        $record = $this->createRecordAction->run($createRecordDto);
        return redirect()->to('wallet/'.$record->getWalletId());
    }
}
