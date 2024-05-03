<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

//Auth::routes();

// Rutas Client side

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');  // No muy necesario -> Ver flujo de autenticacion
 
Route::get('/', function () {
    return view('cliente/index');
});
Route::get('/show', [ProductoController::class, 'show'])->name('show_product');


// Rutas Administration side









