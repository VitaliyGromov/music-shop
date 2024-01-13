<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->title,
            'description' => fake()->text,
            'in_stock' => fake()->boolean,
            'price' => fake()->numerify,
            'subcategory_id' => Subcategory::withoutEvents(fn() => Subcategory::factory()->create()->id),
            'brand_id' => Brand::withoutEvents(fn() => Brand::factory()->create()->id),
        ];
    }
}
