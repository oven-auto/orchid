<?php

namespace App\Orchid\Layouts\Product;

use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;
use App\Models\Product;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Layouts\Block;

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
            TD::make('name', 'Название')
                ->render(function ($product) {
                    if ($product->image()->exists())
                        return '<a href="' . route('product.edit', $product) . '">'
                            . '<img src="' . $product->image->image . '" style="width: 50px;">'
                            . '<span class="ps-3">' . $product->name . '</span>'
                            . '</a>';
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
