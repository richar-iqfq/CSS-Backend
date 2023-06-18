<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspeciesController;

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
Route::get('/especies/filter', [EspeciesController::class, 'filter']);

Route::get('/especies/{id}', [EspeciesController::class, 'show']);

Route::get('/especies', [EspeciesController::class, 'index']);