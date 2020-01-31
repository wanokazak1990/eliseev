<?php

use Faker\Generator as Faker;

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

$factory->define(App\PartsModule\Part::class, function (Faker $faker) {
    
    $code_stock = $faker->sentence(rand(3,8), true);
    $code_catalog = $faker->realText(rand(10,20));
    $name = $faker->realText(rand(10,50));
    $untitArray = ['шт','ком-т'];
    $unit = $untitArray[rand(0,1)];
    $count = rand(1,50);
    $out_tax = rand(1,100000);
    $purchase = rand(1,100000);
    $price = rand(1,100000);
    return [
        'code_stock' => $code_stock,
        'code_catalog' => $code_catalog,
        'name' => $name,
        'unit' => $unit,
        'count' => $count,
        'out_tax' => $out_tax,
        'purchase' => $purchase,
        'price' => $price
    ];
});
