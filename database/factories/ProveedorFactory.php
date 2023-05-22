<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proveedor>
 */
class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */
    protected $model = Proveedor::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre'=>$this->faker->name(),
            'marca'=>$this->faker->randomElement(['Mobil','Bardahl','LTH','Akron','Quaker']),
            'telefono'=>$this->faker->randomNumber(9, true),
            'correo'=>$this->faker->unique()->safeEmail()
        ];
    }
}
