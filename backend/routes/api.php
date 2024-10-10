<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthLoginController;
use App\Http\Controllers\Auth\AuthLogoutController;
use App\Http\Controllers\Vaccine\ReadVaccineCenterController;
use App\Http\Controllers\VaccineCandidate\RegisterVaccineCandidateController;
use App\Http\Controllers\VaccineCandidate\ReadAllVaccineCandidateController;
use App\Http\Controllers\VaccineCandidate\ReadVaccineCandidateController;
use App\Http\Controllers\VaccineCandidate\AssignScheduleVaccineCandidateController;
use App\Http\Controllers\VaccineCandidate\SearchVaccineCandidateController;

/******************* Authentication API Endpoints *******************************/
Route::post('login', AuthLoginController::class);
Route::post('logout', AuthLogoutController::class)->middleware('auth:sanctum');

/******************* Vaccine Centers API Endpoints *******************************/
Route::get('vaccine-centers', ReadVaccineCenterController::class);

/******************* Vaccine Candidate API Endpoints *******************************/
Route::post('vaccine-candidates', RegisterVaccineCandidateController::class);
Route::get('vaccine-candidates', ReadAllVaccineCandidateController::class)->middleware('auth:sanctum');
Route::get('vaccine-candidates/{id}', ReadVaccineCandidateController::class);
Route::patch('vaccine-candidates/{id}/schedule', AssignScheduleVaccineCandidateController::class);
Route::get('vaccine-candidates/search/by-nid', SearchVaccineCandidateController::class);
