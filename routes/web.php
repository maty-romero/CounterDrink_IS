<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProveedorController; 

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
    return view('administrativa.usuario.editar-usuario');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//crear grupo de rutas para el controlador de servicios

Route::group(['prefix' => 'usuario'], function () {
    Route::resource('usuario', UsuarioController::class);

});



Route::group(['prefix' => 'venta'], function () {
    Route::resource('venta', VentaController::class);

});



Route::group(['prefix' => 'producto'], function () {
    Route::resource('producto', ProductoController::class);

});



Route::group(['prefix' => 'proveedor'], function () {
    Route::resource('proveedor', ProveedorController::class);

});



Route::group(['prefix' => 'stock'], function () {
    Route::resource('stock', StockController::class);

});