<?php

use Illuminate\Support\Facades\Route;
use App\Simulador\SimuladorNuptic43Controller;
use App\Servidor\ServidorOrbalController;
use App\Http\Controllers\HomeController;

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
Route::get('/', [HomeController::class, 'run']);

/**
 * Llamada al simulador
 */
Route::get('/simulador', [SimuladorNuptic43Controller::class, 'run']);

/**
 * Recibe las llamadas generadas por el simulador
 */
Route::group(['prefix'=>'servidor'], function(){
    Route::get('/', [ServidorOrbalController::class, 'run']);
    Route::get('/get', [ServidorOrbalController::class, 'getAll']);
});
