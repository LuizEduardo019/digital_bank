<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AccountApiController;
use App\Http\Controllers\Api\BankApiController;
use App\Http\Controllers\Api\AgencyApiController;
use App\Http\Controllers\Api\UserApiController;


//bank
Route::get('bank', [BankApiController::class, 'index']);

//agency
Route::get('agency', [AgencyApiController::class, 'index']);

//account
Route::get('account', [AccountApiController::class, 'index']);

//user
Route::post('user', [UserApiController::class, 'store']);
Route::get('user', [UserApiController::class, 'index']);

//payments
Route::get('payments', [paymentsApiController::class, 'index'])->middleware('auth');
Route::post('payments_store', [paymentsApiController::class, 'store'])->middleware('auth');
Route::put('payments_update', [paymentsApiController::class, 'update'])->middleware('auth');

//transfers
Route::get('transfers', [transfersApiController::class, 'index'])->middleware('auth');

//extract

Route::get('extract', [extractApiController::class, 'index'])->middleware('auth');