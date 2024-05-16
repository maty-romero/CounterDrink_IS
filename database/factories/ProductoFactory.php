<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /*
        $table->id();
            $table->string('nombre_producto', 100)->unique();
            $table->string('descripcion', 500)->nullable();
            $table->string('imagenURL'); 
            $table->integer('stock')->default(1);
            $table->decimal('precio_producto', 12, 2)->default(0.00);
            $table->decimal('contenido_alcohol', 12, 2)->default(0.00);
            $table->enum('tipo_bebida', ['cerveza', 'vino', 'whisky', 'vodka']);
            $table->decimal('capacidad_ml', 12, 2)->default(0.00);
            $table->string('marca', 100);
            $table->timestamps();

            $table->unsignedBigInteger('id_proveedor');
        */
        return [
            'nombre_producto' => fake()->name(),
            'descripcion' => fake()->text(),
            "imagenUrl" => fake()->randomElement([
                "https://images.unsplash.com/photo-1555041469-a586c61ea9bc?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D",
                "https://images.unsplash.com/photo-1505843490538-5133c6c7d0e1?q=80&w=1818&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
            ]),
              
        ];
    }
}
