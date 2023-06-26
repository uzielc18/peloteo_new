<?php


use App\Http\Controllers\Api\UserController;

use App\Http\Controllers\Api\SocioController;

use App\Http\Controllers\Api\ReservasUsuarioController;

use App\Http\Controllers\Api\ProvinciaController;

use App\Http\Controllers\Api\PaiseController;

use App\Http\Controllers\Api\PagostipoController;

use App\Http\Controllers\Api\PagosSocioController;

use App\Http\Controllers\Api\LocaleController;

use App\Http\Controllers\Api\JugadoreController;

use App\Http\Controllers\Api\ImageneController;

use App\Http\Controllers\Api\HorarioController;

use App\Http\Controllers\Api\DistritoController;

use App\Http\Controllers\Api\DepartamentoController;

use App\Http\Controllers\Api\CanchasTipoController;

use App\Http\Controllers\Api\CanchaController;

use App\Http\Controllers\Api\BancoController;
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

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('bancos', BancoController::class);
Route::apiResource('canchas', CanchaController::class);
Route::apiResource('canchasTipos', CanchasTipoController::class);
Route::apiResource('departamentos', DepartamentoController::class);
Route::apiResource('distritos', DistritoController::class);
Route::apiResource('horarios', HorarioController::class);
Route::apiResource('imagenes', ImageneController::class);
Route::apiResource('jugadores', JugadoreController::class);
Route::apiResource('locales', LocaleController::class);
Route::apiResource('pagosSocios', PagosSocioController::class);
Route::apiResource('pagostipos', PagostipoController::class);
Route::apiResource('paises', PaiseController::class);
Route::apiResource('provincias', ProvinciaController::class);
Route::apiResource('reservasUsuarios', ReservasUsuarioController::class);
Route::apiResource('socios', SocioController::class);
Route::apiResource('users', UserController::class);
