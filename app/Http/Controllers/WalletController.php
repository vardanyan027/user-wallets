<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWalletRequest;
use App\Models\Wallets;
use App\Services\Wallet\Actions\CreateWalletAction;
use App\Services\Wallet\Dto\CreateWalletDto;
use App\Services\Wallet\WalletService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WalletController extends Controller
{
    private CreateWalletAction $createWalletAction;
    private WalletService $walletService;

    public function __construct(
        CreateWalletAction $createWalletAction,
        WalletService $walletService,
    )
    {
        $this->createWalletAction = $createWalletAction;
        $this->walletService = $walletService;
    }

    public function getById(int $id): Factory|View|Application
    {
        $wallet = Wallets::where('id', $id)->first();
        return view('wallet')->with([
            'wallet' => $wallet,
            'records' => $wallet->records,
        ]);
    }

    public function delete(Request $request): RedirectResponse
    {
        $this->walletService->delete($id);
        return redirect()->to('/home');
    }

    public function create(CreateWalletRequest $createWalletRequest)
    {
        $createWalletDto = new CreateWalletDto($createWalletRequest->getName(), $createWalletRequest->getType(), auth()->user()->id);
        $this->createWalletAction->run($createWalletDto);
    }
}
