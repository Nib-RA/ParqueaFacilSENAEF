<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdministradorController;

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

Route::get('admin/mostrarPropietarios', [AdministradorController::class, 'mostrarPropietarios']);

Route::get('vigi', function () {
    return view('vigilante.vigilanteindex');
});

Route::get('cond', function () {
    return view('conductor.conductorinfo');
});