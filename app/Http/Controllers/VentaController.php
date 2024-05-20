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

    public function editCart(FormRequest $r, $tipoItem, $id)
    {
        Venta::editarCantidadCarrito($id, $r->incremento, $tipoItem);
        return to_route('carrito');
    }

    public function removeFromCart($id, $tipoItem)
    {
        Venta::removerDelCarrito($id, $tipoItem);
        return to_route('carrito');
    }
}
