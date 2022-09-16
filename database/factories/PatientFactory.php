<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Patients;
use Faker\Generator as Faker;

$factory->define(Patients::class, function (Faker $faker) {
    return [
        "name" => $faker->name,
        "address" => $faker->address,
        "contactnumber" => $faker->phoneNumber,
        "bod" => $faker->dateTime,
        "occupation" => 'student',
        "sex" => 'male',
       

    ];
});
