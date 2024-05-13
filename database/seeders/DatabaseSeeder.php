<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Seed proveedores
        for ($i = 0; $i < 10; $i++) {
            DB::table('proveedores')->insert([
                'nombre_proveedor' => $faker->company,
                'cuit' => $faker->unique()->numerify('########'),
                'nro_telefono' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Seed productos
        for ($i = 0; $i < 20; $i++) {
            DB::table('productos')->insert([
                'nombre_producto' => $faker->word,
                'descripcion' => $faker->sentence,
                'imagenURL' => $faker->imageUrl(),
                'stock' => $faker->numberBetween(0, 100),
                'precio_producto' => $faker->randomFloat(2, 10, 100),
                'contenido_alcohol' => $faker->randomFloat(2, 1, 50),
                'tipo_bebida' => $faker->randomElement(['cerveza', 'vino', 'whisky', 'vodka']),
                'capacidad_ml' => $faker->numberBetween(200, 1000),
                'marca' => $faker->word,
                'id_proveedor' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Seed ventas
        for ($i = 0; $i < 10; $i++) {
            DB::table('ventas')->insert([
                'fecha_venta' => $faker->dateTimeBetween('-1 year', 'now'),
                'monto_final_venta' => $faker->randomFloat(2, 50, 500),
                'nro_pago' => $faker->unique()->randomNumber(5),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Seed productos_vendidos
        for ($i = 0; $i < 50; $i++) {
            DB::table('productos_vendidos')->insert([
                'id_venta' => $faker->numberBetween(1, 10),
                'id_producto' => $faker->numberBetween(1, 20),
                'unidades_vendidas_prod' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
