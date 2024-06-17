<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Producto;
use App\Models\ProductosVendidos;
use App\Models\Venta;
use Illuminate\Foundation\Testing\RefreshDatabase;


class VentaTest extends TestCase
{
    use RefreshDatabase;

    public function test_hay_stock_suficiente_carrito()
    {
        $producto1 = Producto::factory()->create(['stock' => 10]);
        $producto2 = Producto::factory()->create(['stock' => 20]);

        session()->put('carrito', [
            (object) ['elemento' => $producto1, 'unidades' => 2],
            (object) ['elemento' => $producto2, 'unidades' => 3],
        ]);

        $hayStock = Venta::hayStockCarrito();
        $this->assertTrue($hayStock); // true = hay stock suficiente 
    }

    public function test_no_hay_stock_suficiente_carrito()
    {
        $producto1 = Producto::factory()->create(['stock' => 2]);

        // mas unidades disp que stock
        session()->put('carrito', [
            (object) ['elemento' => $producto1, 'unidades' => 3] 
        ]);

        $hayStock = Venta::hayStockCarrito();
        $this->assertFalse($hayStock); // false = no hay stock suficiente 
    }

    public function test_finalizar_venta_escritura_en_database()
    {
        // Crear productos con stock suficiente
        $producto1 = Producto::factory()->create(['stock' => 10]);
        $producto2 = Producto::factory()->create(['stock' => 20]);

        session()->put('carrito', [
            (object) ['elemento' => $producto1, 'unidades' => 2],
            (object) ['elemento' => $producto2, 'unidades' => 3],
        ]);
        
        $subtotalPreviaEscritura = Venta::calcularSubtotal();
        $idVenta = Venta::finalizarVenta();

        // Verificar que se haya creado correctamente la venta
        $this->assertNotNull($idVenta);
        $ventaGuardada = Venta::find($idVenta);
        $this->assertNotNull($ventaGuardada);
        $this->assertEquals(round($subtotalPreviaEscritura, 2), round($ventaGuardada->monto_final_venta, 2));

        // Check creaccion productos vendidos
        $productosVendidos = ProductosVendidos::where('id_venta', $idVenta)->get();
        $this->assertCount(2, $productosVendidos); // escritura de 2 productos vendidos

        // Verificacion reduccion de stock correcta
        $producto1Actualizado = Producto::find($producto1->id);
        $producto2Actualizado = Producto::find($producto2->id);
        $this->assertEquals(8, $producto1Actualizado->stock); // 10 - 2 unidades vendidas
        $this->assertEquals(17, $producto2Actualizado->stock); // 20 - 3 unidades vendidas

        $carritoActualizado = session()->get('carrito');
        $this->assertEmpty($carritoActualizado); // Carrito vacio luego de la venta
    }


}
