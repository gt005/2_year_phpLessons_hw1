<?php

namespace Database\Factories;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $random_product = Product::query()->inRandomOrder()->first();

        return [
            'product_price' => $random_product->price,
            'product_name' => $random_product->name,
            'App\Models\Product' => $random_product->id,
            'amount' => $this->faker->numberBetween(1, 10),
            'App\Models\Order' => Order::query()->inRandomOrder()->first()->id,
        ];
    }
}
