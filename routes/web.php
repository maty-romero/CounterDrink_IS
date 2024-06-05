<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Rutas anteriores 
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*
Route::get('/', function () {
    return view('/administrativa/productos/Stock');
})->name('holamundo');
*/ 

Auth::routes();

// Rutas Client side
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');  // No muy necesario -> Ver flujo de autenticacion

Route::get('/', [VentaController::class, 'homeShop'])->name('home_shop');
Route::get('/show', [ProductoController::class, 'show'])->name('show_product');
Route::get('/carrito', [VentaController::class, 'getCarrito'])->name('show_carrito');

// Rutas Administration side
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios_index');
Route::get('/usuarios/edit/{id}', [UsuarioController::class, 'edit'])->name('usuarios_edit');
Route::put('/usuarios/update/{id}', [UsuarioController::class, 'update'])->name('usuarios_update');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios_create');
Route::delete('/usuarios/destroy/{id}', [UsuarioController::class, 'destroy'])->name('usuarios_destroy');


Route::get('/ventas', [VentaController::class, 'index'])->name('ventas_index');
Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas_create');


Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores_index');
Route::get('/proveedores/edit/{id}', [ProveedorController::class, 'edit'])->name('proveedores_edit');
Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores_create');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos_index');
Route::get('/productos/edit/{id}', [ProductoController::class, 'edit'])->name('productos_edit');
Route::put('/productos/update/{id}', [ProductoController::class, 'update'])->name('producto_update');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos_create');
Route::delete('/productos/destroy/{id}', [ProductoController::class, 'destroy'])->name('productos_destroy');
Route::get('/productos/show/{id}', [ProductoController::class, 'show'])->name('productos_show');

Route::get('/productos/stock', [StockController::class, 'index'])->name('stock_index');
Route::post('/productos/stock', [StockController::class, 'update'])->name('stock_update');









