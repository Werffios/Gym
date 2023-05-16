<?php

namespace Database\Factories;


use App\Models\Curriculum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'document' => $this->faker->unique()->randomNumber(9),
            'date_of_birth' => $this->faker->date(),
            'id_curriculum' => Curriculum::all()->random()->id,
        ];
    }

}
