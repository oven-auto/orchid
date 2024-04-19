<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = [
            [
                'value' => 1,
                'names' => ['Соевый соус']
            ],
            [
                'value' => 2,
                'names' => ['Палочки', 'Ложечки']
            ],
            [
                'value' => 3,
                'names' => ['Моцарела', "Ветчина", "Томатный соус", "Томаты", "Огурчики", "Курочка", "Болгарский перец"],
            ],
        ];

        foreach ($arr as $item) {
            foreach ($item['names'] as $name)
                Ingredient::updateOrCreate(['name' => $name], ['ingredient_value_id' => $item['value']]);
        }
    }
}
