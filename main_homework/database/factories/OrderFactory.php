<?php

namespace Database\Factories;

use App\Models\User;
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
    public function definition()
    {
        return [
            'order_number' => $this->faker->numberBetween(100000, 999999),
            'order_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'user_id' => User::query()->inRandomOrder()->first()->id,
        ];
    }
}
