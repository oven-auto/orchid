<?php

namespace App\Repositories\Product\DTO;

use App\Classes\DTO\AbstractDTO;

class ProductGroupSaveDTO extends AbstractDTO
{
    private const FIELDS = ['name', 'sort'];

    public function __construct(array $data)
    {
        $this->fields = self::FIELDS;

        foreach ($this->fields as $item)
            if (array_key_exists($item, $data))
                $this->set($item, $data[$item]);
    }
}
