<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Repositories\Product\ProductGroupRepository;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{
    public function get(Request $request, ProductGroupRepository $repo)
    {
        $groups = $repo->productionGroup()->sortBy('sort');

        return response()->json([
            'data' => $groups,
            'success' => 1,
        ]);
    }
}
