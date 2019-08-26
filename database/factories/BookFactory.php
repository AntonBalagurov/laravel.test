<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'author_id' => $faker->numberBetween(1,10),
        'name' => $faker->realText(50),
        'count_pages' => $faker->numberBetween(1, 500),
        'description' => $faker->realText(100),
        ];
});
