<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Support\Collection
     */
    public function toArray($request)
    {
        return $this->collection->transform(function ($item) {
            $sumStarts = $item->reviews->sum('star');
            $countReviews = $item->reviews->count();
            return [
                'product_name' => $item->product_name,
                'product_price' =>$item->product_price,
                'discount' =>$item->discount,
                'totPrice' => round((1- ($item->discount/100)) * $item->product_price, 2),
                'rating' => $countReviews > 0 ? round($sumStarts / $countReviews, 2) : 'Not rating yet',
                'href' => [
                    'reviews' => route('products.show', $item->id)
                ]
            ];
        });
    }
}
