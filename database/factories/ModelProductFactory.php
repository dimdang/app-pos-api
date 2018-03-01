<?php

use Faker\Generator as Faker;

$factory->define(App\Model\Product::class, function (Faker $faker) {
    return [
        'product_name'=>$faker->word,
        'product_detail'=>$faker->paragraph,
        'product_price'=>$faker->numberBetween(100, 1000),
        'stock'=>$faker->randomDigit,
        'discount'=>$faker->numberBetween(2, 10)
    ];
});
