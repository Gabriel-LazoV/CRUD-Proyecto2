<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    
    public function definition(): array
    {
        return [
            'marca'=>$this->faker->randomElement(['Mobil','Bardahl','LTH','Akron','Quaker']),
            'categoria'=>$this->faker->randomElement(['Aceite','Filtros','Lubricantes','Anticongelante']),
            'folio'=>$this->faker->randomNumber(9, true)
        ];
    }
}
