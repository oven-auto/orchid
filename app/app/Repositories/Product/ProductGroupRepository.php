<?php

namespace App\Repositories\Product;

use App\Models\ProductGroup;
use App\Repositories\Product\DTO\ProductGroupSaveDTO;

class ProductGroupRepository
{
    public function get(array $data = [])
    {
        $query = ProductGroup::query();

        $groups = $query->get();

        return $groups;
    }



    public function productionGroup(array $data = [])
    {
        $query = ProductGroup::query()
            ->select('product_groups.*')
            ->rightJoin('products', 'products.product_group_id', 'product_groups.id')
            ->groupBy('product_groups.id');

        $groups = $query->get();

        return $groups;
    }



    public function save(ProductGroup $productGroup, array $data)
    {
        $data['sort'] = $data['sort'] ?? $productGroup->setSortAutomatic();

        $productGroup->fill((new ProductGroupSaveDTO($data))->get())->save();
    }



    public function delete(ProductGroup $productGroup)
    {
        $productGroup->delete();
    }
}
