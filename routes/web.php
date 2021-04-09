<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\PropietarioController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\VigilanteController;

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

Route::get('/', LoginController::class);

Route::get('admin', AdministradorController::class);

Route::resource('admin/administradors', AdministradorController::class);

Route::resource('admin/vigilantes', VigilanteController::class);

Route::resource('admin/propietarios', PropietarioController::class);

Route::resource('admin/vehiculos', VehiculoController::class);

Route::get('vigi', function () {
    return view('vigilante.vigilanteindex');
});

Route::get('cond', function () {
    return view('conductor.conductorinfo');
});
