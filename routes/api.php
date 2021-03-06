<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdutoController;
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
//Route::get('/usuario', [UsuarioController::class, 'index']);

//Route::get('/usuario/{id}', [UsuarioController::class, 'show']);

//Route::post('/usuario', [UsuarioController::class, 'store']);

//Route::put('/usuario/{id}', [UsuarioController::class, 'update']);

//Route::delete('/usuario/{id}', [UsuarioController::class, 'destroy']);


/* --- VENDEDOR --- */
//Route::get('/vendedor', [VendedorController::class, 'index']);

//Route::get('/vendedor/{id}', [VendedorController::class, 'show']);

//Route::post('/vendedor', [VendedorController::class, 'store']);

//Route::put('/vendedor/{id}', [VendedorController::class, 'update']);

//Route::delete('/vendedor/{id}', [VendedorController::class, 'destroy']);


/* --- PRODUTOS --- */
//Route::get('/produto', [ProdutoController::class, 'index']);

//Route::get('/produto/{id}', [ProdutoController::class, 'show']);

//Route::post('/produto', [ProdutoController::class, 'store']);

//Route::put('/produto/{id}', [ProdutoController::class, 'update']);

//Route::delete('/produto/{id}', [ProdutoController::class, 'destroy']);


//Route::apiResource('usuario', UsuarioController::class);
//Route::apiResource('produto', ProdutoController::class);
//Route::apiResource('vendedor', VendedorController::class);

Route::group(['middleware' => ['auth:sanctum']], function() {

    Route::apiResources([
        'usuario' => UsuarioController::class,
        'produto' => ProdutoController::class,
        'vendedor' => VendedorController::class,
    ]);

    Route::post('/logout', [AuthController::class, 'logout']);

});



Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);



