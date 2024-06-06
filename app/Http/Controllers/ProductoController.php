<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto; 
use App\Models\Proveedor;

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
        $proveedores = Proveedor::all();
        return view('administrativa.productos.create',compact('proveedores'));
    }

    public function store(Request $request)
    {   

    $producto = new Producto();
    $producto->nombre_producto = $request->name;
    $producto->stock = $request->stock;
    $producto->descripcion = $request->descripcion;
    $producto->precio_producto = $request->precio;
    $producto->contenido_alcohol = $request->vol;
    $producto->tipo_bebida = $request->tipo;
    $producto->capacidad_ml = $request->capacidad;
    $producto->marca = $request->marca;
    $producto->id_proveedor = $request->proveedor;


    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $imagenURL = 'img/' . $imagen->getClientOriginalName();
        $imagen->move(public_path('img'), $imagen->getClientOriginalName());
        $producto->imagenURL = $imagenURL;
    }

        $producto->save();

        return redirect()->route('productos_index')->with('success', 'Producto agregado correctamente.');
    }



    public function show(string $id)
    {
        $producto = Producto::find($id);
        return view('administrativa.productos.show', compact('producto'));
    }

    
    public function edit(string $id)
    {
        $producto = Producto::find($id);
        return view('administrativa.productos.edit', compact('producto'));
    }
    
    public function update(Request $request, string $id)
{
    $producto = Producto::find($id);
    
    $producto->nombre_producto = $request->name;
    $producto->stock = $request->stock;
    $producto->descripcion = $request->descripcion;
    $producto->precio_producto = $request->precio;
    $producto->contenido_alcohol = $request->vol;
    $producto->tipo_bebida = $request->tipo;
    $producto->capacidad_ml = $request->capacidad;
    $producto->marca = $request->marca;
    
    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $imagenURL = 'img/' . $imagen->getClientOriginalName();
        $imagen->move(public_path('img'), $imagen->getClientOriginalName());
        $producto->imagenURL = $imagenURL;
    }
    
    $producto->save();
    
    return redirect()->route('productos_index')->with('success', 'El producto ha sido modificado exitosamente');
}

    

     
    public function destroy(string $id)
    {
        $producto = Producto::find($id);
        $producto->delete();
        return redirect()->route('productos_index')->with('success', 'producto eliminado correctamente');  
    }
}
