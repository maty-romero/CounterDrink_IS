<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Producto;
use Illuminate\Foundation\Testing\RefreshDatabase;

class VentaControllerTest extends TestCase
{
    use RefreshDatabase;


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
