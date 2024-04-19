<?php

namespace App\Repositories\Product\DTO;

use App\Classes\DTO\AbstractDTO;

class ProductSaveDTO extends AbstractDTO
{
    private const FIELDS = ['price', 'name', 'product_group_id'];

    public function __construct(array $data)
    {
        $this->fields = self::FIELDS;

        foreach ($this->fields as $item)
            if (array_key_exists($item, $data))
                $this->set($item, $data[$item]);
    }
}
