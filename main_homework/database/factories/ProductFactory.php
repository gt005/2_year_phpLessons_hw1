<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\SubCategory;
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
    public function definition()
    {
        return [
            'name' => $this->faker->words(2, true),
            'description' => $this->faker->text(100),
            'price' => $this->faker->numberBetween(100, 100000),
            'App\Models\Category' => Category::query()->inRandomOrder()->first()->id,
            'App\Models\SubCategory' => SubCategory::query()->inRandomOrder()->first()->id,
            'image'=>'https://source.unsplash.com/random'

        ];
    }
}
