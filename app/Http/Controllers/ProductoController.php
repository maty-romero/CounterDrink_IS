<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use App\Models\Venta; 
use Illuminate\Http\Request;
use App\Models\Producto; 

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all()->map(function ($producto) {
            return [
                'Nro Producto' => $producto->id,
                'Nombre' => $producto->nombre_producto,
                'Marca' => $producto->marca,
                'Stock' => $producto->stock,
                'Precio' => $producto->precio_producto,
                'capacidad en (Lts)' => $producto->capacidad_ml, 
                'Descripcion' => $producto->descripcion,
            ];
        });
        return view('administrativa.productos.index', compact('productos'));
    }

    

    public function create()
    {
        return view('administrativa.productos.create');
    }

    public function store(Request $request)
    {
       
    }

    public function show(string $id)
    {
        $producto = Producto::findOrFail($id);  

        if ($producto->stock > 0) {
            $enCarrito = Venta::enCarrito($id);
            
            $productos_relacionados = Producto::where('tipo_bebida', '=', $producto->tipo_bebida)
            ->where('id', '!=', $id) // Excluir producto actual
            ->limit(4)
            ->get();
            
            return view('cliente.show', [
                'producto' => $producto, 
                'enCarrito' => $enCarrito, 
                'productos_relacionados' => $productos_relacionados
            ]);
        }
        return view('cliente.show', compact('producto', 'productos_relacionados'));
    }
    
    public function edit(string $id)
    {
        return view('administrativa.productos.edit');
    }
     
}
