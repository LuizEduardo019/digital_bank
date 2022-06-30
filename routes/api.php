<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AccountApiController;
use App\Http\Controllers\Api\BankApiController;
use App\Http\Controllers\Api\AgencyApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\PaymentApiController;
use App\Http\Controllers\Api\TransferApiController;
use App\Http\Controllers\Api\ExtractApiController;
use App\Models\Account;

//bank
Route::get('bank', [BankApiController::class, 'index'])->middleware('auth:api');

//agency
Route::get('agency', [AgencyApiController::class, 'index']);

//account
Route::get('account', [AccountApiController::class, 'index']);

//user
Route::post('user', [UserApiController::class, 'store']);
Route::get('user', [UserApiController::class, 'index']);

Route::get('balance', function (Request $request) {
    return Account::select('balance')->where('user_id', auth()->user()->id)->first();
})->middleware('auth:api');

//payments
Route::get('payment', [PaymentApiController::class, 'index'])->middleware('auth:api');
Route::post('payment_store', [PaymentApiController::class, 'store'])->middleware('auth:api');
Route::put('payment_update', [PaymentApiController::class, 'update'])->middleware('auth:api');

//transfers
Route::post('transfers', [TransferApiController::class, 'store'])->middleware('auth:api');

//extract
Route::get('extract', [ExtractApiController::class, 'index'])->middleware('auth:api');
