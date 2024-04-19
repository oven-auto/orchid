<?php

namespace App\Orchid\Screens\Product;

use App\Http\Requests\Product\ProductSaveRequest;
use Orchid\Screen\Screen;
use App\Models\Product;
use App\Models\ProductGroup;
use App\Repositories\Product\ProductRepository;
use Illuminate\Http\Request;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Relation;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Screen\Fields\Picture;
use Orchid\Support\Facades\Alert;
use Orchid\Screen\Fields\Upload;

class ProductEditScreen extends Screen
{
    private $repo;

    private const TITLES = [
        'create' => 'Создать товар',
        'update' => 'Изменить товар',
        'delete' => 'Удалить товар',
        'cansel' => 'Отмена',
    ];

    public $product;

    public function __construct(ProductRepository $repo)
    {
        $this->repo = $repo;
    }
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Product $product): iterable
    {
        return [
            'product' => $product,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->product->exists ? self::TITLES['update'] : self::TITLES['create'];
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Button::make(self::TITLES['create'])
                ->icon('pencil')
                ->method('createOrUpdate')
                ->class('btn btn-success')
                ->canSee(!$this->product->exists),

            Button::make(self::TITLES['update'])
                ->icon('pencil')
                ->method('createOrUpdate')
                ->class('btn btn-primary')
                ->canSee($this->product->exists),

            Button::make(self::TITLES['delete'])
                ->icon('trash')
                ->class('btn btn-danger')
                ->method('remove')
                ->canSee($this->product->exists),

            Button::make(self::TITLES['cansel'])
                ->icon('trash')
                ->class('btn btn-secondary')
                ->method('backToList')
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            Layout::split([
                Layout::rows([
                    Input::make('product.name')
                        ->title('Название товара')
                        ->placeholder('Введите название товара'),

                    Relation::make('product.product_group_id')
                        ->title('Группа товара')
                        ->fromModel(ProductGroup::class, 'name', 'id')
                        ->placeholder('Выберите группу товара'),


                    Input::make('product.price')
                        ->title('Стоимость')
                        ->type('number')
                        ->placeholder('Пример: 100'),

                    Picture::make('product.image.image')
                        ->title('Изображение товара')
                        ->groups('documents'),
                ]),

                Layout::rows([
                    //CheckBox::make('product.ingredients.[]');
                ]),
            ])->ratio('40/60'),
        ];
    }



    /**
     * CREATE OR UPDATE PRODUCT
     */
    public function createOrUpdate(ProductSaveRequest $request)
    {
        $this->repo->save($this->product, $request->validated()['product']);

        Alert::info('Изменения приняты');

        return redirect()->route('product.edit', $this->product);
    }



    /**
     * DELETE PRODUCT
     */
    public function remove(Product $product)
    {
        $this->repo->delete($this->product);

        Alert::info('Товар удален');

        return redirect()->route('product.list');
    }



    /**
     * RETURN TO LIST
     */
    public function backToList()
    {
        return redirect()->route('product.list');
    }
}
