<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Venta; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use stdClass; 
class VentaController extends Controller
{
    public function index()
    {
        return view('administrativa/ventas/index');
    }
    public function create()
    {
        $request = new Request();
        $request->setLaravelSession(session());
        $detalle = $request->session()->get('detalleVenta');
        $subtotal = Venta::calcularSubtotalDetalleVenta(); 

        $productos = Producto::all();        
        return view('administrativa/ventas/create', [
            'productos' => $productos,
            'detalleVenta' => $detalle,
            'subtotal' => $subtotal    
        ]);
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
        //return response()->json(['success' => 'Producto eliminado exitosamente.'], 200)
        //return redirect()->back(); 
    }

    public function storeVentaOnline(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'nombre' => 'required|string|max:15',
                'apellido' => 'required|string|max:15',
                'dni' => 'required|digits:8'
            ], [
                'nombre.required' => 'El campo Nombre es obligatorio.',
                'nombre.string' => 'El campo Nombre debe ser texto.',
                'nombre.max' => 'El campo Nombre no puede tener más de 15 caracteres.',
                
                'apellido.required' => 'El campo Apellido es obligatorio.',
                'apellido.string' => 'El campo Apellido debe ser texto.',
                'apellido.max' => 'El campo Apellido no puede tener más de 15 caracteres.',
                
                'dni.required' => 'El campo DNI es obligatorio.',
                'dni.digits' => 'El campo DNI debe tener exactamente 8 dígitos.',
            ]);
            $validator->validate();

            // se envia en la request pero se usa siempre este para fines de simplicidad
            $metodoPago = 'mercadopago';   

            if (!Venta::hayStockCarrito()) {
                $msj = 'Error al realizar la compra. Algunos de los productos de tu carrito no tienen stock suficiente.';
                return redirect()->back()->withInput()->with('msj', $msj);
            }

            if (!Venta::realizarPago($metodoPago, Venta::calcularSubtotal())) {
                $msj = 'Error al procesar el pago. Intente de nuevo.';
                return redirect()->back()->withInput()->with('msj', $msj);
            }

            $idVenta = Venta::finalizarVenta();
            session()->flash('success', 'Su compra se ha realizada con éxito.');
            session()->flash('nroComprobante', $idVenta); // nro comprobante para generacion pdf 
            
            $cliente = new stdClass();  // datos del cliente para el comprobante 
            $cliente->nombre_cliente = $request->input('nombre') . " " . $request->input('apellido');
            $cliente->dni = $request->input('dni');
            session(['cliente' => $cliente]);

            return to_route('home_shop');

        }catch (ValidationException $e) {
            $msj = 'Error al realizar la compra. Los datos de retiro está incompleta o no es válida.';
            session()->flash('msj', $msj); 
            return redirect()->back()->withInput()->withErrors($e->validator->errors());
        }
    }

    // verifica la existencia de ventas en un periodo de fechas
    public function validarVentas(Request $request)
    {
        //dd($request);
        $fechaDesde = $request->input('fecha_desde');
        $fechaHasta = $request->input('fecha_hasta');

        $fechaDesdeInicio = $fechaDesde . ' 00:00:00';
        $fechaHastaFin = $fechaHasta . ' 23:59:59';

        $ventasExist = Venta::whereBetween('fecha_venta', [$fechaDesdeInicio, $fechaHastaFin])->exists();

        if (!$ventasExist) {
            return response()->json(['success' => false, 'message' => 'No existen ventas en el rango de fechas especificado.']);
        } 

        return response()->json(['success' => true]);
    }

    public function agregarProductoDetalleVenta(string $id)
    {
        $request = new Request();
        $request->setLaravelSession(session());
        $detalle = $request->session()->get('detalleVenta'); 

        foreach ($detalle as $item) {
            if ($item->elemento->id == $id) {
                return redirect()->back()->with('error', 'El producto ya está en el detalle de la venta.');
            }
        }

        $productoEncontrado = Producto::findOrFail($id); 
        if($productoEncontrado->stock <= 0){
            return redirect()->back()->with('error', 'El producto no tiene stock suficiente.');    
        }

        $itemVenta = new stdClass();
        $itemVenta->unidades = 1; // inicialmente en 1 
        $itemVenta->elemento = $productoEncontrado;
        
        $detalle[] = $itemVenta;
        $request->session()->put('detalleVenta', $detalle);

        $detalleVenta = $request->session()->get('detalleVenta');
        $subtotal = Venta::calcularSubtotalDetalleVenta(); 

        return view('administrativa.ventas.create', [
            'detalleVenta' => $detalleVenta, 
            'subtotal' => $subtotal,
            'productos' => Producto::all(), 
        ]);
    }

    public function actualizarCantidadProductoDetalleVenta(Request $request, string $id)
    {
        $cantidad = $request->input('cantidad');
        $request->setLaravelSession(session());
        $detalle = $request->session()->get('detalleVenta');

        foreach ($detalle as $item) {
            if ($item->elemento->id == $id) {
                if ($cantidad <= 0) {
                    return response()->json(['error' => 'La cantidad debe ser mayor que cero.'], 400);
                }
                if ($cantidad > $item->elemento->stock) {
                    return response()->json(['error' => 'No hay suficiente stock disponible.'], 400);
                }
                $item->unidades = $cantidad;
                break;
            }
        }
        
        $request->session()->put('detalleVenta', $detalle);
        $subtotal = Venta::calcularSubtotalDetalleVenta();

        return response()->json([
            'success' => true,
            'subtotal' => $subtotal,
            'precio_total' => $item->elemento->precio_producto * $item->unidades
        ]);
    }

    public function eliminarProductoDetalleVenta(Request $request, string $id)
    {
        $request->setLaravelSession(session());
        $detalle = $request->session()->get('detalleVenta', []);
        
        $detalle = array_filter($detalle, function($item) use ($id) {
            return $item->elemento->id != $id; // Filtrado producto a eliminar
        });

        $detalle = array_values($detalle); 
        $request->session()->put('detalleVenta', $detalle);

        $subtotal = Venta::calcularSubtotalDetalleVenta();
        $productos = Producto::all();

        return view('administrativa.ventas.create', [
            'detalleVenta' => $detalle,
            'productos' => $productos,
            'subtotal' => $subtotal
        ]);
    }



}
