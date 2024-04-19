<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\ProductGroup;
use App\Repositories\Product\ProductGroupRepository;
use Illuminate\Http\Request;

class ProductGroupController extends Controller
{
    private $repo;

    public function __construct(ProductGroupRepository $repo)
    {
        $this->repo = $repo;
    }



    public function index()
    {
        $groups = $this->repo->get();

        return response()->json([
            'success' => 1,
            'data' => $groups,
        ]);
    }



    public function store(ProductGroup $productgroup, Request $request)
    {
        $this->repo->save($productgroup, $request->all());

        return response()->json([
            'data' => $productgroup,
            'success' => 1,
            'message' => 'Group created',
        ]);
    }



    public function update(ProductGroup $productgroup, Request $request)
    {
        $this->repo->save($productgroup, $request->all());

        return response()->json([
            'data' => $productgroup,
            'success' => 1,
            'message' => 'Group created',
        ]);
    }



    public function show(ProductGroup $productgroup)
    {
        return response()->json([
            'data' => $productgroup,
            'success' => 1,
        ]);
    }



    public function destroy(ProductGroup $productgroup)
    {
        $this->repo->delete($productgroup);

        return response()->json([
            'success' => 1,
            'message' => 'Group deleted',
        ]);
    }
}
