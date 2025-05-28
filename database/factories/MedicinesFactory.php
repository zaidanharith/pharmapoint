<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicines>
 */
class MedicinesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->word(10),
            'slug'=>fake()->slug(2),
            'price'=>fake()->numberBetween(10000,100000),
            'stock'=>fake()->numberBetween(1,100),
            'image'=>fake()->numberBetween(1,5),
            'category_id'=>Category::factory()
        ];
    }
}
