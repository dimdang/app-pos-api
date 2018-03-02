<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['product_name', 'product_detail', 'product_price', 'stock', 'discount'];

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
