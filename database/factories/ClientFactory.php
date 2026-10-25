<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'email' => fake()->unique()->companyEmail(),
            'status' => fake()->randomElement(['active', 'archived']),
            'vat_number' => fake()->numerify('IT###########'),
            'phone_prefix' => '+39',
            'phone' => fake()->numerify('3#########'),
            'pec' => fake()->unique()->safeEmail(),
            'billing_address' => fake()->streetAddress(),
            'billing_city' => fake()->city(),
            'billing_zip' => fake()->postcode(),
            'billing_province' => fake()->stateAbbr(),
            'billing_country' => 'IT',
            'billing_recipient_code' => fake()->regexify('[A-Z0-9]{7}'),
            'website' => fake()->url(),
            'linkedin' => 'https://linkedin.com/company/' . fake()->slug(),
            'notes' => fake()->optional()->paragraph(),
        ];
    }

    /**
     * Indicate that the client is active.
     */
    public function active(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'active',
        ]);
    }

    /**
     * Indicate that the client is archived.
     */
    public function archived(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => 'archived',
        ]);
    }

    /**
     * Indicate that the client has minimal data.
     */
    public function minimal(): static
    {
        return $this->state(fn (array $attributes) => [
            'vat_number' => null,
            'phone_prefix' => null,
            'phone' => null,
            'pec' => null,
            'billing_address' => null,
            'billing_city' => null,
            'billing_zip' => null,
            'billing_province' => null,
            'billing_country' => null,
            'billing_recipient_code' => null,
            'website' => null,
            'linkedin' => null,
            'notes' => null,
        ]);
    }
}
