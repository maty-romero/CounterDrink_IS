<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // usuarios 
        $usuarios = array(
            array('name' => 'pablo', 'email' => 'administrador@gmail.com', 'email_verified_at' => now(), 'rol_usuario' => "administrador", "password" => "123456789", 'remember_token' => Str::random(10)),
            array('name' => 'marcos', 'email' => 'cajero@gmail.com', 'email_verified_at' => now(), 'rol_usuario' => "cajero", "password" => "123456789", 'remember_token' => Str::random(10)),
            array('name' => 'sebastian', 'email' => 'abastecedor@gmail.com', 'email_verified_at' => now(), 'rol_usuario' => "abastecedor", "password" => "123456789", 'remember_token' => Str::random(10)),
        );
        
        foreach ($usuarios as $user) {
            User::create($user);
        }

        // proveedores 
        $proveedores = array(
            array('nombre_proveedor' => 'SecretBodega', 'cuit' => '20123456781', 'nro_telefono' => '0111234567', 'email' => 'secretbodega@example.com'),
            array('nombre_proveedor' => 'AlquiDestil', 'cuit' => '30876543212', 'nro_telefono' => '0119876543', 'email' => 'alquidestil@example.com'),
            array('nombre_proveedor' => 'BosqueBrew', 'cuit' => '40246810123', 'nro_telefono' => '0112468012', 'email' => 'bosquebrew@example.com'),
        ); 
        foreach ($proveedores as $prov) {
            Proveedor::create($prov);
        }

        // productos 
        $productos = array(
            array(
                'nombre_producto' => 'Cerveza Rubia Heineken',
                'descripcion' => 'Una cerveza rubia refrescante y suave, con un equilibrio perfecto entre el amargor del lúpulo y las notas sutiles de malta. Ideal para disfrutar en cualquier ocasión.',
                'imagenURL' => 'https://www.guiadelacerveza.com/wp-content/uploads/2023/04/Cerveza-Heineken-European-Lager.png',
                'stock' => 50,
                'precio_producto' => 2100.00,
                'contenido_alcohol' => 5.0,
                'tipo_bebida' => 'cerveza',
                'capacidad_ml' => 1000,
                'marca' => 'Heineken',
                'id_proveedor' => 1, // ID del proveedor SecretBodega
            ),
            array(
                'nombre_producto' => 'Vino Malbec Luigi Bosca',
                'descripcion' => 'Un Malbec de Luigi Bosca que cautiva con su profundo color rojo y aromas a frutos rojos maduros. En boca, ofrece una textura sedosa y sabores intensos a ciruelas y especias, culminando en un final largo y elegante',
                'imagenURL' => 'https://jumboargentina.vtexassets.com/arquivos/ids/787839-800-auto?v=638246002080600000&width=800&height=auto&aspect=true',
                'stock' => 30,
                'precio_producto' => 8350.00,
                'contenido_alcohol' => 13.5,
                'tipo_bebida' => 'vino',
                'capacidad_ml' => 750,
                'marca' => 'Luigi Bosca',
                'id_proveedor' => 1, // ID del proveedor SecretBodega
            ),
            // Productos para AlquiDestil
            array(
                'nombre_producto' => 'Whisky Johnnie Walker',
                'descripcion' => 'El Whisky Johnnie Walker Black Label es una obra maestra de la destilería escocesa. Con su distintivo sabor ahumado, notas de vainilla y especias, es una experiencia de sabor inigualable que refleja la artesanía y la tradición de la marca',
                'imagenURL' => 'https://jumboargentina.vtexassets.com/arquivos/ids/580854-800-auto?v=637220856267230000&width=800&height=auto&aspect=true',
                'stock' => 60,
                'precio_producto' => 45000.00,
                'contenido_alcohol' => 40.0,
                'tipo_bebida' => 'whisky',
                'capacidad_ml' => 1000,
                'marca' => 'Johnnie Walker',
                'id_proveedor' => 2, // ID del proveedor AlquiDestil
            ),
            array(
                'nombre_producto' => 'Vodka Smirnoff',
                'descripcion' => 'El Vodka Smirnoff es reconocido por su pureza y suavidad incomparables. Destilado múltiples veces y filtrado con carbón, ofrece un perfil de sabor suave y neutro, perfecto para mezclar en cócteles o disfrutar solo con hielo',
                'imagenURL' => 'https://jumboargentina.vtexassets.com/arquivos/ids/580828-800-auto?v=637220856183930000&width=800&height=auto&aspect=true',
                'stock' => 20,
                'precio_producto' => 4100.00,
                'contenido_alcohol' => 37.5,
                'tipo_bebida' => 'vodka',
                'capacidad_ml' => 750,
                'marca' => 'Smirnoff',
                'id_proveedor' => 2, // ID del proveedor AlquiDestil
            ),
            // Productos para BosqueBrew
            array(
                'nombre_producto' => 'Cerveza Rubia Brahma Chopp',
                'descripcion' => 'Brahma Chopp es una cerveza rubia refrescante con un sabor equilibrado y ligero amargor. Con su carácter suave y notas refrescantes, es la compañía perfecta para momentos de relajación y diversión.',
                'imagenURL' => 'https://jumboargentina.vtexassets.com/arquivos/ids/588355-800-auto?v=637280467046370000&width=800&height=auto&aspect=true',
                'stock' => 60,
                'precio_producto' => 1950.00,
                'contenido_alcohol' => 5.0,
                'tipo_bebida' => 'cerveza',
                'capacidad_ml' => 500,
                'marca' => 'Brahma',
                'id_proveedor' => 3, // ID del proveedor BosqueBrew
            )
        );

        foreach ($productos as $prod) {
            Producto::create($prod);
        }
    }
}
