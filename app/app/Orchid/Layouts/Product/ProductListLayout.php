<?php

namespace App\Orchid\Layouts\Product;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\Product;
use Orchid\Screen\Actions\Link;

class ProductListLayout extends Table
{
    /**
     * Data source.
     *
     * The name of the key to fetch it from the query.
     * The results of which will be elements of the table.
     *
     * @var string
     */
    protected $target = 'products';

    /**
     * Get the table cells to be displayed.
     *
     * @return TD[]
     */
    protected function columns(): iterable
    {
        return [
            TD::make('id', 'Название')
                ->render(function ($product) {
                    if ($product->image()->exists())
                        return '<img src="' . $product->image->image . '" style="width: 50px;">';
                })
                ->width('50px'),

            TD::make('name', '')
                ->render(function (Product $product) {
                    return Link::make($product->name)
                        ->route('product.edit', $product)
                        ->render();
                }),

            TD::make('price', 'Стоимость')
                ->render(function ($product) {
                    return $product->formatedPrice;
                })
                ->width('150px')
                ->alignCenter(),

            TD::make('group', 'Группа')
                ->render(function ($product) {
                    return $product->group->name;
                })
                ->width('150px')
                ->alignCenter(),

            TD::make('created_at', 'Дата создания')
                ->render(function ($product) {
                    return $product->created_at->format('d.m.Y');
                })
                ->width('150px')
                ->alignCenter(),

            TD::make('updated_at', 'Дата изменения')
                ->render(function ($product) {
                    return $product->updated_at->format('d.m.Y');
                })
                ->width('150px')
                ->alignCenter(),
        ];
    }
}
