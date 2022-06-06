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

Auth::routes();

Route::resource('registroentradas', App\Http\Controllers\RegistroentradaController::class);
Route::resource('registrosalidas', App\Http\Controllers\RegistrosalidaController::class);
Route::resource('herramientas', App\Http\Controllers\HerramientaController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
