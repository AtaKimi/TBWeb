<?php

namespace Database\Factories;

use App\Models\Isbn;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => Isbn::all()->random(1)[0]->uuid,
            'title' => fake()->sentence(),
            'writer' => fake()->name(),
            'summary' => fake()->paragraph(),
            'price' => fake()->numberBetween(1, 1000) * 1000,
            'photo' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/9/9a/Laravel.svg/1200px-Laravel.svg.png',
            'book_kind_id' => fake()->numberBetween(1, 30),
        ];
    }
}
