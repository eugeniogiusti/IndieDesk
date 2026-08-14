<?php

namespace Database\Factories;

use App\Models\TaxFundMovement;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TaxFundMovement>
 */
class TaxFundMovementFactory extends Factory
{
    protected $model = TaxFundMovement::class;

    public function definition(): array
    {
        return [
            'date' => fake()->dateTimeBetween('-6 months', 'now'),
            'amount' => fake()->randomFloat(2, 50, 2000),
            'notes' => fake()->optional()->sentence(),
        ];
    }

    public function withdrawal(): static
    {
        return $this->state(fn (array $attributes) => [
            'amount' => -abs($attributes['amount'] ?? fake()->randomFloat(2, 50, 2000)),
        ]);
    }
}
