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