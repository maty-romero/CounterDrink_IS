<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Proveedor;

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
        return [
            'nombre_producto' => $this->faker->word,
            'descripcion' => $this->faker->sentence,
            'imagenURL' => $this->faker->imageUrl(),
            'stock' => $this->faker->numberBetween(1, 50), // Valor por defecto para el stock
            'precio_producto' => $this->faker->randomFloat(2, 1, 100),
            'contenido_alcohol' => $this->faker->randomFloat(2, 0, 40),
            'tipo_bebida' => $this->faker->word,
            'capacidad_ml' => $this->faker->numberBetween(250, 2000),
            'marca' => $this->faker->word,
            'id_proveedor' => Proveedor::factory() // Utiliza la factory de Proveedor
        ];
    }
}
