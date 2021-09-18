<?php

use Illuminate\Support\Facades\Route;
use App\Simulador\SimuladorNuptic43Controller;
use App\Servidor\ServidorOrbalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return "Wellcome to la tierra ORNI (Objeto Reqüestador No Identificado)";
});

/**
 * Llamada al simulador
 */
Route::get('/simulador', [SimuladorNuptic43Controller::class, 'run']);

/**
 * Recibe las llamadas generadas por el simulador
 */
Route::get('/servidor', [ServidorOrbalController::class, 'run']);
