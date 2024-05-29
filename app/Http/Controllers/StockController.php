<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto; 

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::all()->map(function ($producto) {
            return [
                'Nro Producto' => $producto->id,
                'Nombre' => $producto->nombre_producto,
                'Marca' => $producto->marca,
                'Stock' => $producto->stock,
                'Precio' => $producto->precio_producto,
            ];
        });
        return view('administrativa.productos.Stock', compact('productos'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    public function update(Request $request)
{
    $cambios = json_decode($request->input('cambios'), true);

    foreach ($cambios as $cambio) {
        $producto = Producto::find($cambio['nroProducto']);
        if ($producto) {
            if ($cambio['stockAlterado'] > 0) {
                $producto->stock += $cambio['stockAlterado'];
            } else {
                $producto->stock -= abs($cambio['stockAlterado']);
            }
            $producto->save();
        }
    }
    return redirect()->route('stock_index')->with('success', 'Stock actualizado con éxito.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function createSupervisor()
    {
        
    }
}
