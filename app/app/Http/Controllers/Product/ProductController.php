<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $repo;

    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->repo->get();

        return response()->json([
            'data' => $products,
            'success' => 1,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Product $product, Request $request)
    {
        $this->repo->save($product, $request->all());

        return response()->json([
            'data' => $product,
            'success' => 1,
            'message' => 'Product creted',
        ]);
    }



    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json([
            'data' => $product,
            'success' => 1,
        ]);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Product $product, Request $request)
    {
        $this->repo->save($product, $request->all());

        return response()->json([
            'data' => $product,
            'success' => 1,
            'message' => 'Product updated',
        ]);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->repo->delete($product);

        return response()->json([
            'success' => 1,
            'message' => 'Product deleted',
        ]);
    }
}
