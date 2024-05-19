<?php

namespace App\Http\Controllers;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return view('administrativa.productos.index');
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
        $productos_relacionados = Producto::where('tipo_bebida', '=', $producto->tipo_bebida)
            ->where('id', '!=', $id) // Excluir producto actual
            ->limit(4)
            ->get(); 
        return view('cliente.show', compact('producto', 'productos_relacionados'));
    }
    
    public function edit(string $id)
    {
        return view('administrativa.productos.edit');
    }
     
}
