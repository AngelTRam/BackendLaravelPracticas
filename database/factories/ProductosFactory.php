<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Productos>
 */
class ProductosFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nombre'=>fake()->name(),
            'precio'=>fake()->randomFloat(2,15,1000),
            'cantidad'=>fake()->randomFloat(2,0,500),
            'descripcion'=>fake()->text()
        ];
    }
}
