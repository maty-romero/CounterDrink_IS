<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\http\Request; 
use stdClass;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = [
        "fecha_venta",
        "monto_final_venta",
        "nro_pago",
    ];
    protected $table = "ventas"; 
    private static ?PasarelaFactory $pasarelaFactory = null;
    // M-M producto venta
    public function producto(): BelongsToMany 
    {
        return $this->belongsToMany(Producto::class, "producto_venta", "id_venta", "id_producto")
            ->withPivot('unidades_vendidas_prod');
    }
    
    private static function getPasarelaFactory(): PasarelaFactory
    {
        if (is_null(self::$pasarelaFactory)) {
            self::$pasarelaFactory = new PasarelaFactory();
        }
        return self::$pasarelaFactory;
    }

    public static function realizarPago($metodoPago, $monto)
    {   //Simula la aceptación o no del pago 
        $pasarela = Venta::getPasarelaFactory()->crearPasarela($metodoPago);
        $resu = $pasarela->pagar($monto); // random boolean 
        return $resu;
    }

    public static function getCarrito()
    {
        $request = new Request();
        $request->setLaravelSession(session());
        $carrito = $request->session()->get('carrito');
        return $carrito;
    }
    public static function enCarrito(string $id) 
    {
        if ($carrito = Venta::getCarrito()) {
            foreach ($carrito as $item) {
                if ($item->elemento->id == $id) { return true; } 
            }
        }
        return false;
    }

    public static function agregarAlCarrito(string $id)
    {
        $request = new Request();
        $request->setLaravelSession(session());
        $carrito = $request->session()->get('carrito');

        $itemVenta = new stdClass();
        
        $itemVenta->unidades = request()->input('unidadesProducto');
        $itemVenta->elemento = Producto::findOrFail($id);
        
        
        $carrito[] = $itemVenta;
        $request->session()->put('carrito', $carrito);
    }

    public static function editarCantidadCarrito(string $id, string $operacion) : bool
    {
        $carrito = Venta::getCarrito();
        foreach ($carrito as $item) {
            if ($item->elemento->id != $id) {
                continue;
            }
    
            if ($operacion === '+') {
                if ($item->elemento->hayStockProducto($item->unidades + 1)) {
                    $item->unidades++;
                    return true;
                }
                return false; // No hay stock suficiente
            }
    
            if ($operacion === '-') {
                if ($item->unidades > 1) {
                    $item->unidades--;
                    return true;
                }
                return false; // Operación no válida
            }
    
            return false; // Operación no válida
        }
    
        return false; // No se encontró el item en el carrito
    }

    public static function removerDelCarrito(string $id)
    {
        $request = new Request();
        $request->setLaravelSession(session());

        $carrito = Venta::getCarrito();
        $carrito2 = array();

        foreach ($carrito as $item) {

            if($item->elemento->id == $id) { // excluyo item
                continue; 
            }
            $carrito2[] = $item;

        }
        $request->session()->put('carrito', $carrito2);
    }

    public static function hayStockCarrito()
    {
        $carrito = Venta::getCarrito();
        foreach ($carrito as $item) {
            if (!$item->elemento->hayStockProducto($item->unidades)) {
                return false; // hay un producto sin stock
            }
        }
        return true;
    }

    public static function calcularSubtotal()
    {
        $subtotal = 0; //Subtotal del carrito
        $carrito = Venta::getCarrito(); 
        if ($carrito = Venta::getCarrito()) {
            foreach ($carrito as $item) {
                $subtotal += $item->elemento->getPrecioDeVenta() * $item->unidades;   
            }
        }
        return $subtotal;
    }

    public static function finalizarVenta()
    {
        $carrito = Venta::getCarrito();

        //Guardar venta
        $venta = new Venta;
        $venta->fecha_venta = now('GMT-3');
        $venta->monto_final_venta = Venta::calcularSubtotal();
        $venta->nro_pago = rand(1, 100000); //Al ser simulado se genera un random
        $venta->save();

        //Guardar productos vendidos
        foreach ($carrito as $item) {
            $producto = new ProductosVendidos();
            $producto->id_venta = $venta->id;
            $producto->id_producto = $item->elemento->id;
            $producto->unidades_vendidas_prod = $item->unidades;
            $producto->save();
            //Actualizar stock del producto
            $item->elemento->reducirStockProducto($item->unidades);
        }
        //Limpia el carrito
        $request = new Request();
        $request->setLaravelSession(session());
        $request->session()->put('carrito', array());

        return $venta->id;
    }

        

    
    
}
