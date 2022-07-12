<?php

namespace Database\Factories;

use App\Models\Eleve;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class eleveFactory extends Factory
{

    protected $model = Eleve::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'civ' => $this->faker->title(),
            'nom' => $this->faker->firstName(),
            'prenom' => $this->faker->lastName()
        ];
    }
}
