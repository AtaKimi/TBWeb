<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Isbn::factory(30)->create();
        \App\Models\BookKind::factory(30)->create();
        \App\Models\Book::factory(30)->create();
        \App\Models\BookIdentity::factory(50)->create();
        \App\Models\BookIdentityPivot::factory(100)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
