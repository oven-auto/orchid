<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get(Request $request, ProductRepository $repo)
    {
        $validated = $request->validate([
            'product_group_id' => 'sometimes|integer',
        ]);

        $products = $repo->get($validated);

        return response()->json([
            'data' => $products->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->name,
                    'hitable' => rand(0, 1),
                    'newest' => rand(0, 1),
                    'price' => $item->price,
                    'ingredients' => $item->ingredients->map(function ($ingredient) {
                        return $ingredient->ingredient->name;
                    }),
                    'image' => $item->getImage(),
                ];
            }),
            'success' => 1,
        ]);
    }
}
