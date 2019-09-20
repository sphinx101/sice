<?php

use Faker\Generator as Faker;

$factory->define(sice\Models\Centrotrabajo::class, function (Faker $faker) {
    return [
          'cct'=>$faker->unique()->postcode,
          'nombre'=>$faker->unique()->city
    ];
});
