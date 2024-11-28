<?php

use App\Http\Controllers\SMSController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SMSController::class, 'index']);
Route::get('/get-number', [SMSController::class, 'getNumber']);
Route::get('/cancel-number', [SMSController::class, 'cancelNumber']);
Route::get('/get-sms', [SMSController::class, 'getSMS']);
Route::get('/get-status', [SMSController::class, 'getStatus']);
