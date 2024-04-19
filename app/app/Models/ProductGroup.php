<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGroup extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;



    public function setSortAutomatic()
    {
        $currentSort = $this->sort ?? ProductGroup::max('sort') + 1;

        return $currentSort;
    }
}
