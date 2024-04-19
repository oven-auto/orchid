<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductIngredient extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = [];

    /**
     * RELATIONS
     */

    /**
     * INGREDIENT
     */
    public function ingredient()
    {
        return $this->hasOne(\App\Models\Ingredient::class, 'id', 'ingredient_id');
    }
}
