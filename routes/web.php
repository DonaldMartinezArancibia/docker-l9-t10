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

// Route::get('/', function () { return view('welcome'); });
Route::get('/', [App\Http\Controllers\RegistrosalidaController::class, 'pIndex']);

Auth::routes();

Route::resource('registrosalidas', App\Http\Controllers\RegistrosalidaController::class);
Route::resource('herramientas', App\Http\Controllers\HerramientaController::class);
Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);
Route::resource('categorias', App\Http\Controllers\CategoriaController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
