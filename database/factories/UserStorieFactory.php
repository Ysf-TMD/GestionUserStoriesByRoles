<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserStorie>
 */
class UserStorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            "nomUserStorie"=>fake()->name(),
            "description"=>fake()->text(),
            "id_utilisateur"=>$this->faker->numberBetween(1,20)
        ];
    }
}
