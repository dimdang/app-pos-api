<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $sumStarts = $this->reviews->sum('star');
        $countReviews = $this->reviews->count();

        return [
            'product_name' => $this->product_name,
            'product_detail' =>$this->product_detail,
            'product_price' =>$this->product_price,
            'stock' =>$this->stock == 0 ? 'Out of Stock' : $this->stock,
            'discount' =>$this->discount,
            'totPrice' => round((1- ($this->discount/100)) * $this->product_price, 2),
            'rating' => $countReviews > 0 ? round($sumStarts / $countReviews, 2) : 'Not rating yet',
            'href' => [
                'reviews' => route('reviews.index', $this->id)
            ]
        ];
    }
}
