<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class Product extends Model
{
    use HasFactory, AsSource;

    protected $guarded = [];

    /**
     * RELATIONS
     */

    /**
     * GROUP
     */
    public function group()
    {
        return $this->hasOne(\App\Models\ProductGroup::class, 'id', 'product_group_id');
    }



    /**
     * INGREDIENTS
     */
    public function ingredients()
    {
        return $this->hasMany(\App\Models\ProductIngredient::class, 'product_id', 'id')->with('ingredient');
    }



    /**
     * IMAGE
     */
    public function image()
    {
        return $this->hasOne(\App\Models\ProductImage::class, 'product_id', 'id');
    }



    /**
     * METHODS
     */

    /**
     * GET IMAGE
     */
    public function getImage()
    {
        if ($this->image()->exists())
            return asset($this->image->image);
        return '';
    }



    public function getFormatedPriceAttribute()
    {
        return number_format($this->price, 0, '', ' ');
    }
}
