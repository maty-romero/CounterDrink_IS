<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Producto;
use App\Models\User; 
use App\Models\Proveedor; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;

class ProductoTest extends TestCase
{
     use RefreshDatabase;
     /**
     * Test product registration.
     */

     public function test_registro_producto_con_proveedor_inexistente(): void
    {
        // Simular el almacenamiento de archivos en disco 'public'
        Storage::fake('public');
        $user = User::factory()->create();

        $producto = [
            'name' => 'Cerveza Artesanal',
            'stock' => 100,
            'descripcion' => 'Cerveza con sabor único',
            'precio' => 50.00,
            'vol' => 5.0,
            'tipo' => 'cerveza',
            'capacidad' => 500,
            'marca' => 'Artesanal',
            'proveedor' => 9999,  
            'imagen' => UploadedFile::fake()->create('vino.jpeg')
        ];

        // Hacer una petición POST a la ruta de registro de productos
        $response = $this->actingAs($user)->postJson('/productos/store', $producto);
        
        // Asegurarse de que la petición falló debido a la existencia del proveedor
        $response->assertStatus(400);
        
        $response->assertJson([
            'message' => 'Error de validación: El campo proveedor seleccionado es inválido.',
        ]);
    }

    
     
     public function test_registro_producto(): void
     {
         // Simular el almacenamiento de archivos en disco 'public'
         Storage::fake('public');
         $user = User::factory()->create();

         // Crear un proveedor con id 1
         Proveedor::factory()->create(['id' => 1, 'nombre_proveedor' => 'Proveedor Test','nro_telefono' => '123456789','email' => 'test@gmail.com','cuit' => '123456789']);
         
         $producto = [
             'name' => 'Cerveza Artesanal',
             'stock' => 100,
             'descripcion' => 'Cerveza con sabor único',
             'precio' => 50.00,
             'vol' => 5.0,
             'tipo' => 'cerveza', 
             'capacidad' => 500,
             'marca' => 'Artesanal',
             'proveedor' => 1,
             'imagen' => UploadedFile::fake()->create('vino.jpeg')  
            ];
     
         $response = $this->actingAs($user)->postJson('/productos/store', $producto);
         
         //me muestra el mensaje de exito
         //dd($response->getContent());

         // Asegurarse de que la petición fue exitosa
         $response->assertStatus(200);

         // Asegurarse de que el producto fue almacenado en la base de datos
         $response->assertJson(['message' => 'El producto ha sido registrado con éxito']);
        }


        
        public function test_registro_producto_con_datos_invalidos(): void
        {
            // Simular el almacenamiento de archivos en disco 'public'
            Storage::fake('public');
            $user = User::factory()->create();

            // Crear un proveedor con id 1
            Proveedor::factory()->create(['id' => 1, 'nombre_proveedor' => 'Proveedor Test', 'nro_telefono' => '123456789', 'email' => 'test@gmail.com', 'cuit' => '123456789']);
            
            // Datos del producto con datos inválidos
            $productoInvalido = [
                'name' => '', // Nombre vacío
                'stock' => -10, // Stock negativo
                'descripcion' => '', // Descripción vacía
                'precio' => -50.00, // Precio negativo
                'vol' => -5.0, // Volumen negativo
                'tipo' => '', // Tipo vacío
                'capacidad' => -500, // Capacidad negativa
                'marca' => '', // Marca vacía
                'proveedor' => 9999, // Proveedor inexistente
                'imagen' => UploadedFile::fake()->create('vino.jpeg')  // Simula que se envía un archivo sin contenido
            ];

            $response = $this->actingAs($user)->post('/productos/store', $productoInvalido);

            // Asegurarse de que la petición falló debido a errores de validación
            $response->assertStatus(400);
        }

        
        public function test_registro_producto_duplicado(): void
        {
            // Simular el almacenamiento de archivos en disco 'public'
            Storage::fake('public');
            $user = User::factory()->create();
                    
            $producto = [
                'name' => 'Cerveza Artesanal', //como el nombre es unique va a saltar error
                'stock' => 100,
                'descripcion' => 'Cerveza con sabor único',
                'precio' => 50.00,
                'vol' => 5.0,
                'tipo' => 'cerveza', // Ajustado según el enum en la base de datos
                'capacidad' => 500,
                'marca' => 'Artesanal',
                'proveedor' => 1,
                'imagen' => UploadedFile::fake()->create('vino.jpeg')  // Simula que se envía un archivo sin contenido
            ];
        
            // Hacer una petición POST a la ruta de registro de productos
            $response = $this->actingAs($user)->postJson('/productos/store', $producto);
            
            // Asegurarse de que la petición fue exitosa
            $response->assertStatus(400);
        
        }
    }
