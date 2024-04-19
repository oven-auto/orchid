<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Ingredient;
use App\Repositories\Product\IngredientRepository;
use Illuminate\Http\Request;

class IngredientController extends Controller
{
    private $repo;

    public function __construct(IngredientRepository $repo)
    {
        $this->repo = $repo;
    }



    public function index()
    {
        $ingredients = $this->repo->get();

        return response()->json([
            'data' => $ingredients,
            'success' => 1,
        ]);
    }



    public function store(Ingredient $ingredient, Request $request)
    {
        $this->repo->save($ingredient, $request->all());

        return response()->json([
            'data' => $ingredient,
            'success' => 1,
            'message' => 'Ingredient created',
        ]);
    }



    public function update(Ingredient $ingredient, Request $request)
    {
        $this->repo->save($ingredient, $request->all());

        return response()->json([
            'data' => $ingredient,
            'success' => 1,
            'message' => 'Ingredient updated',
        ]);
    }



    public function show(Ingredient $ingredient)
    {
        return response()->json([
            'data' => $ingredient,
            'success' => 1,
        ]);
    }



    public function destroy(Ingredient $ingredient)
    {
        $this->repo->delete($ingredient);

        return response()->json([
            'success' => 1,
            'message' => 'Ingredient deleted',
        ]);
    }
}
