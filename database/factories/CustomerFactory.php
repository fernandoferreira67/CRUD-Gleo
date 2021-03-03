<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'cpf' => $faker->unique()->cpf,
        'rg' => $faker->unique()->rg,
        'phone' => $faker->phoneNumber,
        'cellphone' => $faker->cellphoneNumber, 
        'address' => $faker->streetAddress,
        'district' => $faker->streetName,
        'cep' => $faker->postcode,
        'city' => $faker->city."-".$faker->regionAbbr,
        'description' =>  $faker->sentence,
        'active' => true,
    ];
});
