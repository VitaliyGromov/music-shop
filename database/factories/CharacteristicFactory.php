<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Characteristic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Characteristic>
 */
class CharacteristicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name,
            'category_id' => Category::withoutEvents(fn() => Category::factory()->create()->id)
        ];
    }
}
