<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Model\Review;
use App\Model\Product;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Review::class, function (Faker $faker) {
    return [
		'product_id' => function(){
			return Product::all()->random();
		},
        'customer' => $faker->word,
        'review' => $faker->paragraph,
        'star' => $faker->numberBetween(0 , 5),
    ];
});