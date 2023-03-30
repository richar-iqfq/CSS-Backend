<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
});

Route::get('/usuarios', [UserController::class, 'index']);

Route::get('/usuarios/nuevo', [UserController::class, 'new']);

Route::get('/usuarios/{id}', [UserController::class, 'show'])
    ->where('id', '\d+');

Route::get('/saludo/{name}/{nickname?}', [UserController::class, 'welcome']);