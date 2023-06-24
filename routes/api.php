<?php

use App\Http\Controllers\SpeciesController;
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

/**
 * Especie to json Routes
 */
Route::get('/especies/{id}', [SpeciesController::class, 'show'])
    ->where('id', '\d+');

Route::get('/especies/filter', [SpeciesController::class, 'filter']);

Route::get('/especies', [SpeciesController::class, 'index']);