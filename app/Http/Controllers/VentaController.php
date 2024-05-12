<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        return view('administrativa/ventas/Venta');
    }
    public function create()
    {
        return view('administrativa/ventas/create');
    }

    public function homeShop()
    {
        return view('cliente/index');
    }
    public function getCarrito()
    {
        return view('cliente/carrito');
    }
}
