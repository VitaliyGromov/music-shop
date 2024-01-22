<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\Characteristic;
use App\Models\Subcategory;
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
            'subcategory_id' => Subcategory::withoutEvents(fn () => Subcategory::factory()->create()->id),
        ];
    }
}
