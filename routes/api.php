<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AccountApiController;
use App\Http\Controllers\Api\BankApiController;
use App\Http\Controllers\Api\AgencyApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\PaymentsApiController;
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

Route::get('balance', function (Request $request){
    return Account::select('balance')->where('user_id', auth()->user()->id)->first();
})->middleware('auth:api');

//payments
Route::get('payments', [PaymentsApiController::class, 'index']);
Route::post('payments_store', [PaymentsApiController::class, 'store']);
Route::put('payments_update', [PaymentsApiController::class, 'update']);

//transfers
Route::post('transfers', [TransferApiController::class, 'store'])->middleware('auth:api');

//extract
Route::get('extract', [ExtractApiController::class, 'index']);

