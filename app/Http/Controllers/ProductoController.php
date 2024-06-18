<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta; 
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(5); 
        return view('administrativa.productos.index', compact('productos'));
    }

    

    public function create()
    {
        $proveedores = Proveedor::all();
        return view('administrativa.productos.create',compact('proveedores'));
    }

   
    public function store(Request $request)
    {
        $result = [];
    
        try {
            // Validación de campos
            $request->validate([
                'name' => 'required|string|max:100',
                'stock' => 'required|integer|min:0',
                'descripcion' => 'string|max:500',
                'precio' => 'required|numeric|min:0',
                'vol' => 'required|numeric|min:0',
                'tipo' => ['required', Rule::in(['cerveza', 'vino', 'whisky', 'vodka'])],
                'capacidad' => 'required|numeric|min:0',
                'marca' => 'required|string|max:100',
                'proveedor' => 'required|integer|exists:proveedores,id',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            ]);
    
            // Si todas las validaciones pasan, proceder con el almacenamiento del producto
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
    
            // Guardar la imagen si está presente
            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $imagenURL = 'img/' . $imagen->getClientOriginalName();
                $imagen->move(public_path('img'), $imagen->getClientOriginalName());
                $producto->imagenURL = $imagenURL;
            }
    
            $producto->save();
    
            $result['message'] = 'El producto ha sido registrado con éxito';
            $result['http_status'] = 200;

            if (app()->environment('testing')) {
                return response()->json($result, $result['http_status']);
            }else{
                return redirect()->route('productos_index')->with('success', $result['message']);
            }

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Captura de excepciones de validación Laravel
            $errors = $e->errors();
            $firstError = reset($errors)[0];
    
            $result['message'] = 'Error de validación: ' . $firstError;
            $result['http_status'] = 400;
        } 
    
        return response()->json(['message' => $result['message']], $result['http_status']);
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
        $producto = Producto::find($id);
        return view('administrativa.productos.edit', compact('producto'));
    }
    
    public function update(Request $request, string $id)
    {
        $producto = Producto::find($id);
        
        $producto->nombre_producto = $request->name;
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
        return redirect()->route('productos_index')->with('success', 'El producto ha sido eliminado correctamente');  
    }

    public function clientSearch(Request $request)
    {
        $query = $request->input('query');

        if(!$query){
            $productos = Producto::where('stock', '>=', 1)->get();
            return view('cliente.partials.productos', compact('productos'))->render();
        }

        $productos = Producto::where('nombre_producto', 'LIKE', "%{$query}%")
                        ->where('stock', '>=', 1)
                        ->get();

        if($productos->isEmpty()){ 
            $productos = null; // no hay coincidencias en la busqueda
        }

        return view('cliente.partials.productos', compact('productos'))->render();
    }

     
}
