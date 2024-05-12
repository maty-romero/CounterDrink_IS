<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('administrativa.producto.agregar-producto');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//crear grupo de rutas para el controlador de servicios

Route::group(['prefix' => 'usuario'], function () {
    Route::resource('usuario', UsuarioController::class);
   // Route::get('usuario', [UsuarioController::class, 'create']);

});