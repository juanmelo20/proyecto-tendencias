<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => \App\Models\Customer::factory(),
            'date_of_sale' => $this->faker->dateTime(),
            'total_payment' => $this->faker->randomFloat(2, 0, 1000),
            'registeredby' => $this->faker->word,


        ];
    }
}
