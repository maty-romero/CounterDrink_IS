<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ReporteController;
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

Route::post('/ventas/store/online', [VentaController::class, 'storeVentaOnline'])->name('venta_online_finalizar');
Route::get('/reportes/comprobanteVenta/{nroComprobante}',  [ReporteController::class, "comprobanteVenta"])->name('cliente_comprobante_venta');


// Rutas Administration side
Route::get('/usuarios', [UsuarioController::class, 'index'])->name('usuarios_index');
Route::get('/usuarios/edit/{id}', [UsuarioController::class, 'edit'])->name('usuarios_edit');
Route::put('/usuarios/update/{id}', [UsuarioController::class, 'update'])->name('usuarios_update');
Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios_create');
Route::post('/usuarios/store', [UsuarioController::class, 'store'])->name('usuarios_store');
Route::delete('/usuarios/destroy/{id}', [UsuarioController::class, 'destroy'])->name('usuarios_destroy');


Route::get('/ventas', [VentaController::class, 'index'])->name('ventas_index');
Route::get('/ventas/create', [VentaController::class, 'create'])->name('ventas_create');
Route::post('/ventas/store/presencial', [VentaController::class, 'storeVentaPresencial'])->name('venta_presencial_finalizar');
Route::post('/existeVentas', [VentaController::class, 'validarVentas'])->name('validarVentas');
// Registro nueva venta  
Route::post('/ventas/agregar/{id}', [VentaController::class, 'agregarProductoDetalleVenta'])->name('ventas_agregar_producto')->middleware('web');
Route::post('/ventas/actualizar/{id}', [VentaController::class, 'actualizarCantidadProductoDetalleVenta'])->name('ventas_actualizar_producto');
Route::post('/ventas/eliminar/{id}', [VentaController::class, 'eliminarProductoDetalleVenta'])->name('ventas_eliminar_producto')->middleware('web');
Route::post('/ventas/store/presencial', [VentaController::class, 'storeVentaPresencial'])->name('venta_presencial_finalizar');




Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores_index');
Route::get('/proveedores/edit/{id}', [ProveedorController::class, 'edit'])->name('proveedores_edit');
Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores_create');

Route::post('/proveedores/store', [ProveedorController::class, 'store'])->name('proveedores_store');
Route::put('/proveedores/update/{id}', [ProveedorController::class, 'update'])->name('proveedores_update')->middleware('web');
Route::delete('/proveedores/delete/{id}', [ProveedorController::class, 'destroy'])->name('proveedores_destroy')->middleware('web');


Route::get('/productos', [ProductoController::class, 'index'])->name('productos_index');
Route::get('/productos/edit/{id}', [ProductoController::class, 'edit'])->name('productos_edit');
Route::put('/productos/update/{id}', [ProductoController::class, 'update'])->name('producto_update');
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos_create');
Route::post('/productos/store', [ProductoController::class, 'store'])->name('productos_store');
Route::delete('/productos/destroy/{id}', [ProductoController::class, 'destroy'])->name('productos_destroy');
Route::get('/productos/show/{id}', [ProductoController::class, 'show'])->name('productos_show');

Route::get('/productos/stock', [StockController::class, 'index'])->name('stock_index');
Route::get('/productos/search/cliente', [ProductoController::class, 'clientSearch'])->name('productos_client_search');


Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes_index');
Route::post("/reporteRedirect", [ReporteController::class, "reporteRedirect"])->name("reporteRedirect");

Route::post('/productos/stock', [StockController::class, 'update'])->name('stock_update');









