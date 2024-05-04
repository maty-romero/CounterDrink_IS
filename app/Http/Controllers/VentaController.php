<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function getCarrito()
    {
        return view('cliente/carrito');
    }
}
