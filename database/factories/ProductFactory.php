<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->word(),
            "category" => $this->faker->word(),
            "status" => rand(0, 1),
        ];
    }

    /**
     * This state is present for scribe documentation
     */
    public function scribe()
    {
        return $this->state([
            'id' => 1,
            'name' => 'Scribe Product',
            'category' => 'electronics',
            'status' => 'active',
            'created_at' => "2025-03-26T21:52:20.000000Z",
            'updated_at' => "2025-03-26T21:52:20.000000Z",
        ]);
    }
}
