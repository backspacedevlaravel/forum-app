<?php

use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(App\Model\Category::class, function (Faker $faker) {
    $word = $faker->word;
    return [
        'name' => $word,
        'slug' => Str::slug($word),
    ];
});
