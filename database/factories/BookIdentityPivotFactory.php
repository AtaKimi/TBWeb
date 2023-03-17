<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookIdentityPivot>
 */
class BookIdentityPivotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'book_uuid' => Book::all()->random(1)[0]->uuid,
            'book_identity_id' => fake()->numberBetween(1, 50),
        ];
    }
}
