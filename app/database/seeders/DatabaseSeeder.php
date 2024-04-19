<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => '1Test User',
        //     'email' => '1test@example.com',
        // ]);
        $this->call([
            IngredientValueSeeder::class,
            IngredientSeeder::class,
            ProductGroupSeeder::class,
        ]);
    }
}
