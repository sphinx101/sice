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

$factory->defineAs(sice\User::class, 'docentes', function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'type' =>\sice\Models\Role::query()
                  ->where('name',$faker->randomElement($array=array('director','docente')))
                  ->first()
                  ->name,
        'password' => bcrypt('123456'), // secret
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(sice\User::class, 'alumnos', function (Faker $faker) {
    return [
        'username' => $faker->unique()->userName,
        'email' => $faker->unique()->safeEmail,
        'type' => 'alumno',
        'password' => bcrypt('123456'), // secret
        'remember_token' => str_random(10),
    ];
});
