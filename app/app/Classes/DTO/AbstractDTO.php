<?php

namespace App\Classes\DTO;

class AbstractDTO
{
    protected $data;

    protected $fields = [];

    public function set(string $key, mixed $val): void
    {
        if (in_array($key, $this->fields))
            $this->data[$key] = $val;
    }



    public function get(string $key = null): mixed
    {
        if ($key && isset($this->data[$key]))
            return $this->data[$key];

        return $this->data ?? [];
    }
}
