<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [RegisteredUserController::class, 'store']);
Route::post('login', [AuthenticatedSessionController::class, 'store']);


Route::middleware(['auth:sanctum'])->prefix('v1')->namespace('App\Http\Controllers')->group(function () {
    Route::apiResource('users', 'UserController');
    Route::apiResource('flights', 'FlightController');
    Route::apiResource('airports', 'AirportController');
    Route::apiResource('airlines', 'AirlineController');
    Route::apiResource('passengers', 'PassengerController');
    Route::apiResource('boarding-passes', 'BoardingPassController');
    Route::apiResource('self-services', 'SelfServiceController');
    Route::apiResource('check-in-counters', 'CheckInCounterController');
    Route::apiResource('baggage', 'BaggageController');
    Route::apiResource('staff', 'StaffController');
    Route::apiResource('groups', 'GroupController');
});

