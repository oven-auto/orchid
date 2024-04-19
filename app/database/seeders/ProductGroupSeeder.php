<?php

namespace Database\Seeders;

use App\Models\ProductGroup;
//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $arr = ['Пицца', 'Бургеры', 'Напитки', 'Дессерты'];

        foreach ($arr as $item) {
            ProductGroup::updateOrCreate(['name' => $item], []);
        }
    }
}
