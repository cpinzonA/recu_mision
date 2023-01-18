<?php

namespace Database\Factories;


use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Sport;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Potition>
 */
class PositionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->title(),
            'sport_id'=>Sport::all()->random()->id,
        ];
    }
}
