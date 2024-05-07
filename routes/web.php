<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Auth::routes();

// Rutas Client side

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');  // No muy necesario -> Ver flujo de autenticacion
 
Route::get('/', function () {
    return view('cliente/index');
});
Route::get('/show', [ProductoController::class, 'show'])->name('show_product');
Route::get('/carrito', [VentaController::class, 'getCarrito'])->name('show_carrito');



// Rutas Administration side









