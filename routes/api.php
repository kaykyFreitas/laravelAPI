<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VendedorController;
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

Route::get('/teste', function() {
    return "Teste ok!";
});

/* --- USUARIO --- */
Route::get('/usuario', [UsuarioController::class, 'index']);

Route::get('/usuario/{id}', [UsuarioController::class, 'show']);

Route::post('/usuario', [UsuarioController::class, 'store']);

Route::put('/usuario/{id}', [UsuarioController::class, 'update']);

Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy']);

/* --- VENDEDOR --- */
Route::get('/vendedor', [VendedorController::class, 'index']);

Route::get('/vendedor/{id}', [VendedorController::class, 'show']);

Route::post('/vendedor', [VendedorController::class, 'store']);

Route::put('/vendedor/{id}', [VendedorController::class, 'update']);

Route::delete('/vendedor/{id}', [VendedorController::class, 'destroy']);





Route::middleware('auth:sanctum')->get('/user', function(Request $request) {
    return $request->user();
});
