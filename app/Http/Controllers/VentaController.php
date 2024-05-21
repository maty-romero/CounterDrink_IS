<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta; 
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
    public function showCart()
    {
        $carrito = Venta::getCarrito();
        $subtotal = Venta::calcularSubtotal();
        return view('cliente/carrito', ['carrito' => $carrito, 'subtotal' => $subtotal]);
    }
    public function updateCart(string $id)
    {
        Venta::agregarAlCarrito($id);
        session()->flash('status', 'Producto añadido al carrito exitosamente.');
        return to_route('home_shop');
    }

    public function editCart(Request $request, string $id)
    {
        $operacion = $request->has('incremento') ? '+' : ($request->has('decremento') ? '-' : null);   
        $respuesta = Venta::editarCantidadCarrito($id, $operacion);
        return to_route('show_carrito');
    }

    public function removeFromCart(string $id)
    {
        Venta::removerDelCarrito($id);
        return to_route('show_carrito');
    }
}
