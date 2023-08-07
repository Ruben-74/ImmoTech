<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        $rooms = $this->faker->numberBetween(2,10);

        return [

            'title' => $this->faker->words(3, true),
            'description' => $this->faker->text(200, true),
            'surface' => $this->faker->numberBetween(20,350),
            'rooms' => $rooms,
            'bedrooms' => $this->faker->numberBetween(1, $rooms),
            'floor' => $this->faker->numberBetween(0,15),
            'price' => $this->faker->numberBetween(10000, 2000000),
            'city' => $this->faker->city,
            'postal_code' => $this->faker->postcode,
            'address' => $this->faker->address,
            'sold' => false,
        ];
    }
    public function sold(): static{
        return $this->state(fn (array $attributes) => [
            'sold' => true,
        ]);
    }
}
