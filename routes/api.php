<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/new_movies',[App\Http\Controllers\MovieController::class, 'new_movies']);
Route::get('/specific_movie_theater',[App\Http\Controllers\MovieController::class, 'specific_movie_theater']);
Route::get('/timeslot',[App\Http\Controllers\MovieController::class, 'timeslot']);
