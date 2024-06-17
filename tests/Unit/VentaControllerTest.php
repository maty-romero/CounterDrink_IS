<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VentaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_venta_online_sucess()
    {
        // Creacion productos stock suficiente 
        $producto1 = Producto::factory()->create(['stock' => 10]);
        $producto2 = Producto::factory()->create(['stock' => 20]);

        // Agregar productos al carrito
        session()->put('carrito', [
            (object) ['elemento' => $producto1, 'unidades' => 2],
            (object) ['elemento' => $producto2, 'unidades' => 3],
        ]);

        // Simulacion datos cliente 
        $data = [
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'dni' => '12345678',
        ];

        // Hacer la solicitud de compra
        $response = $this->post(route('venta_online_finalizar'), $data);

        $this->assertEmpty(session('carrito'));

        $response->assertStatus(302); // redirección a la tienda
        $response->assertRedirect(route('home_shop')); 

        // Reduccion de stock luego de la compra 
        $this->assertEquals(8, $producto1->fresh()->stock);
        $this->assertEquals(17, $producto2->fresh()->stock);
    }

    public function test_store_venta_online_producto_sin_stock_en_carrito()
    {
        // Creacion producto stock insuficiente
        $producto = Producto::factory()->create(['stock' => 0]);

        session()->put('carrito', [
            (object) ['elemento' => $producto, 'unidades' => 1], // Sin stock suficiente
        ]);

        $data = [
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'dni' => '12345678',
        ];

        $response = $this->post(route('venta_online_finalizar', $data));
        
        $response->assertStatus(302); // redirección a la tienda
        $response->assertRedirect(route('home_shop'));
        $this->assertNotNull(session('msj')); // cheeck session tiene msj error
    }


}
