<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthLoginController;
use App\Http\Controllers\Auth\AuthLogoutController;
use App\Http\Controllers\Vaccine\ReadVaccineCenterController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

/******************* Authentication API Endpoints *******************************/
Route::post('login', AuthLoginController::class);
Route::post('logout', AuthLogoutController::class)->middleware('auth:sanctum');

/******************* Vaccine Centers API Endpoints *******************************/
Route::get('vaccine-centers', ReadVaccineCenterController::class);
