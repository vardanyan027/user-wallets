<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RecordController;
use App\Http\Controllers\WalletController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/auth/{driver}', [LoginController::class, 'redirectToProvider']);
Route::get('/callback/google', [LoginController::class, 'handleProviderGoogleCallback']);
Route::get('/callback/facebook', [LoginController::class, 'handleProviderFacebookCallback']);

Route::get('wallet/', [WalletController::class, 'index']);
Route::get('wallet/{id}', [WalletController::class, 'getById']);
Route::post('wallet/create', [WalletController::class, 'create'])->name('createWallet');
Route::get('wallet/remove', [WalletController::class, 'delete'])->name('deleteWallet');

Route::post('record/create', [RecordController::class, 'store'])->name('createRecord');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
