<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ConstantsController;
use App\Http\Controllers\ConstantesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function()
{
    return view('home');
})->name('home');

Route::get('/usuarios', [UserController::class, 'index'])
    ->name('users.index');

Route::get('/usuarios/{id}', [UserController::class, 'show'])
    ->where('id', '\d+')
    ->name('users.show');

Route::get('/usuarios/nuevo', [UserController::class, 'create'])
    ->name('users.create');

Route::get('/usuarios/{user}/editar', [UserController::class, 'edit'])
    ->name('users.edit');

Route::put('/usuarios/{user}', [UserController::class, 'update'])
    ->name('users.update');

Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])
    ->name('users.delete');

Route::post('/usuarios', [UserController::class, 'store']);

Route::get('/saludo/{name}/{nickname?}', [UserController::class, 'welcome']);

Route::get('/about', [AboutController::class, 'show'])
    ->name('about.index');

/**
 * -------------------------------------------------------------------
 * Constants IUPAC Routes
 * -------------------------------------------------------------------
*/
Route::get('/constants', [ConstantsController::class, 'index'])
    ->name('constants.index');

Route::post('/constants', [ConstantsController::class, 'filter']);

Route::get('/constants/{id}', [ConstantsController::class, 'show'])
    ->name('constants.show');

/**
 * -------------------------------------------------------------------
 * Constants Compilation Routes
 * -------------------------------------------------------------------
 */
Route::get('/constantes', [ConstantesController::class, 'index'])
    ->name('constantes.index');

Route::post('/constantes', [ConstantesController::class, 'filter']);

Route::get('/constantes/{id}', [ConstantesController::class, 'show'])
    ->name('constantes.show');