<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\OrderService;
use Faker\Generator as Faker;

$factory->define(OrderService::class, function (Faker $faker) {
    return [
        'created_user_id' => 1,
        'status' =>  rand(1, 4),
        'description' => $faker->sentence,
        'solution' => $faker->paragraph(5,true),
        'price' => $faker->randomFloat(2,1,10),
    ];
});
