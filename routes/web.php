<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::resource('multa','Detalle_facturaController');
Route::resource('Lista_vehiculo','Lista_VehiculoController');
Route::resource('parqueadero','ParqueaderoController');
Route::resource('Ingresar','ParqueaderoController');


