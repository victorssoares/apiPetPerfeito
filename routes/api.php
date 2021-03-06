<?php

use App\Http\Controllers\PetsController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('usuarios/login',[UsuarioController::class, 'login']);
Route::post('usuarios/buscar',[UsuarioController::class, 'buscar']);
Route::resource('usuarios', UsuarioController::class);
Route::resource('pets', PetsController::class);
