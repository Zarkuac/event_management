<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/events', [EventController::class, 'getEvents']);
Route::get('/events/{id}', [EventController::class, 'getEventById']);
