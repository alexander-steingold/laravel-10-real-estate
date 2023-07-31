<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company,
            'description' => fake()->paragraph,
            'city' => fake()->city,
            'address' => fake()->address,
            'zip' => fake()->postcode,
            'email' => fake()->email,
            'phone' => fake()->phoneNumber,
            'fax' => fake()->phoneNumber,
            'website' => fake()->domainName,
        ];
    }
}
