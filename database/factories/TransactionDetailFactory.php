<?php

namespace Database\Factories;

use App\Models\Medicines;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction_Detail>
 */
class TransactionDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'transaction_id'=>Transaction::factory(),
            'medicine_id'=>Medicines::factory(),
            'medicine_quantity'=>fake()->numberBetween(1,100),
            'subtotal'=>fake()->numberBetween(1,100000)
        ];
    }
}
