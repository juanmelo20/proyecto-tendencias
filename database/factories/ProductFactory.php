<?php

namespace Database\Factories;

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
            'name' => $this->faker->word,
            'description' => $this->faker->sentence,
            'price_buy' => $this->faker->randomFloat(2, 0, 1000),
            'price_sale' => $this->faker->randomFloat(2, 0, 1000), 
            'quantity_in_stock' => $this->faker->randomNumber(2),
            'registeredby' => $this->faker->word,
            'image'=>randomProductPhoto(),
            'status'=>1,
            
        ];
    }
}
function randomProductPhoto(): string
{
    return "imagesmedicines/" . rand(1,10) . ".jpg";
}
