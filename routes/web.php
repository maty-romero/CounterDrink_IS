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
Route::get('/show/{id}', [ProductoController::class, 'show'])->name('show_product');
// Rutas carrito Client side
Route::get('/carrito', [VentaController::class, 'showCart'])->name('show_carrito');
Route::post('/carrito/{id}', [VentaController::class, 'updateCart'])->name('carrito_agregar')->middleware('web');
Route::patch('/carrito/{id}', [VentaController::class, 'editCart'])->name('carrito_editar');
Route::delete('/carrito/{id}', [VentaController::class, 'removeFromCart'])->name('carrito_eliminar')->middleware('web');


// Rutas Administration side
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios_index');

Route::get('/ventas', [VentaController::class, 'index'])->name('ventas_index');
Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas_create');

Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores_index');
Route::get('/proveedores/edit/{id}', [ProveedorController::class, 'edit'])->name('proveedores_edit');
Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores_create');

Route::get('/productos', [ProductoController::class, 'index'])->name('productos_index');
Route::get('/productos/edit/{id}', [ProductoController::class, 'edit'])->name('productos_edit');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos_create');

Route::get('/productos/stock', [StockController::class, 'index'])->name('stock_index');











