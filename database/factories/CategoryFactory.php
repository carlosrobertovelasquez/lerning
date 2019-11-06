<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->randomElement(['PHP'.'JAVASCRIPT','JAVA','DISENO WEB','SERVIDORES','MYSQL','NOSQL']),
        'description' => $faker->sentence
    ];
});
