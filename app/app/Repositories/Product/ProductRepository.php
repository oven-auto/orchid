<?php

namespace App\Repositories\Product;

use App\Classes\FileLoad\FileLoader;
use App\Models\Product;
use App\Repositories\Product\DTO\ProductSaveDTO;
use \Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ProductRepository
{
    private $loader;

    public function __construct(FileLoader $loader)
    {
        $this->loader = $loader;

        $this->loader->setPathName('products')
            ->setCatalog('products');
    }



    public function get(array $data = [])
    {
        $query = Product::query()->with(['ingredients', 'group', 'image']);

        if (isset($data['product_group_id']))
            $query->where('product_group_id', $data['product_group_id']);

        $products = $query->get();

        return $products;
    }



    private function saveIngredients(Product $product, array $data = null)
    {
        if (!$data)
            return;

        foreach ($data as $item)
            $product->ingredients()->updateOrCreate(
                ['product_id' => $product->id, 'ingredient_id' => $item['id']],
                ['weight' => $item['weight']],
            );
    }



    public function saveImage(Product $product, null|string $file)
    {
        if (!$file)
            return;

        if ($product->image)
            Storage::delete($product->image->image);

        $product->image()->updateOrCreate(
            ['product_id' => $product->id],
            ['image' => $file],
        );
    }



    public function saveRelations(Product $product, array $data)
    {
        $this->saveIngredients($product, $data['ingredients'] ?? null);

        $this->saveImage($product, $data['image']['image'] ?? null);
    }



    public function save(Product $product, array $data): void
    {
        $product->fill((new ProductSaveDTO($data))->get())->save();

        $this->saveRelations($product, $data);
    }



    public function delete(Product $product): void
    {
        $product->delete();
    }
}
