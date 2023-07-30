<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\Product;
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
    public function definition(): array
    {

        return [
            'title' => fake()->sentence(5),
            'description' => fake()->paragraph(3),
            'property_type' => fake()->randomElement(Product::$type),
            'target' => fake()->randomElement(Product::$target),
            'year_built' => fake()->numberBetween(1980, 2023),
            'price' => fake()->numberBetween(100000, 1000000),
            'bedrooms' => fake()->numberBetween(1, 5),
            'bathrooms' => fake()->numberBetween(1, 4),
            'area' => fake()->numberBetween(100, 1000),
            'city' => fake()->city,
            'address' => fake()->address,
            'contact_name' => fake()->name,
            'contact_email' => fake()->email,
            'contact_phone' => fake()->phoneNumber,

            'status' => fake()->boolean(80), // 80% chance of being true (available), 20% chance of false (not available)

        ];
    }
}
