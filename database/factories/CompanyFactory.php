<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Company::class, function (Faker $faker) {
    return [    
		'mail'=> $faker->email,    
		'name'=> $faker->company,
		'rfc'=> Str::random(10)
		'phone'=> $faker->phoneNumber,
		'movil'=> $faker->phoneNumber,
		'zip_code'=> $faker->postcode,
		'address'=> $faker->streetName,
		'number_out'=> $faker->buildingNumber,
		'number_int'=> $faker->buildingNumber,
		'district'=> $faker->streetSuffix,
		'city'=> $faker->city,
		'state'=> $faker->state,
		'reference'=> $faker->secondaryAddress,
		'detail'=> $faker->streetAddress ,
		'observations'=> $faker->text(100),
    ];
});
