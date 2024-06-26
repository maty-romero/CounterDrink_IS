<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//Auth::routes();

// Rutas Client side

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');  // No muy necesario -> Ver flujo de autenticacion

/*
Route::get('/', function () {
    return view('/administrativa/productos/Stock');
})->name('holamundo');
*/ 

Route::get('/', [VentaController::class, 'homeShop'])->name('home_shop');
Route::get('/show', [ProductoController::class, 'show'])->name('show_product');
Route::get('/carrito', [VentaController::class, 'getCarrito'])->name('show_carrito');



// Rutas Administration side

Route::get('/ventas', [VentaController::class, 'index'])->name('ventas_index');
Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas_create');









Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
