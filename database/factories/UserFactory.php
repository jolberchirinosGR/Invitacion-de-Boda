<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'confirm' => $this->faker->boolean,
            'phone' => $this->faker->phoneNumber,
            'arrival' => null,
            'id_responsable' => null, // Aquí puedes definir el id_responsable según tus requisitos
            'id_role' => 2, // Valor predeterminado para id_role, puedes ajustarlo según tus necesidades
        ];
    }
}
