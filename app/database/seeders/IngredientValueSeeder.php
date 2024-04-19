<?php

namespace Database\Seeders;

use App\Models\IngredientValue;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = ['л.', 'шт.', 'г.', 'бут.'];

        foreach ($arr as $item) {
            IngredientValue::updateOrCreate(['name' => $item], []);
        }
    }
}
