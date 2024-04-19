<?php

namespace App\Repositories\Product;

use App\Models\Ingredient;
use App\Repositories\Product\DTO\IngredientSaveDTO;

class IngredientRepository
{
    public function get()
    {
        $query = Ingredient::query();

        $ingredients = $query->get();

        return $ingredients;
    }



    public function save(Ingredient $ingredient, array $data)
    {
        $ingredient->fill((new IngredientSaveDTO($data))->get())->save();
    }



    public function delete(Ingredient $ingredient)
    {
        $ingredient->delete();
    }
}
