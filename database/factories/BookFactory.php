<?php

namespace Database\Factories;

use App\Models\author;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booksName'=>fake()->unique()->paragraph(1),
            'buyCount'=>fake()->numberBetween(34,200),
            'author_id'=> author::get()->random()->id
        ];
    }
}
