<?php

namespace App\Http\Controllers;

use App\Models\Producto;
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
        $productos = Producto::where("stock", ">=", 1)->get();        
        return view('cliente/index', compact('productos'));
    }
    public function getCarrito()
    {
        return view('cliente/carrito');
    }
}
