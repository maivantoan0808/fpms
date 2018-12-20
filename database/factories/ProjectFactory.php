<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Project::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentence,
        'image' => $faker->imageUrl(),
        'vision' => $faker->paragraph,
        'preface' => $faker->sentence,
        'public' => true,
        'created_at' => now(),
        'updated_at' => now(),
    ];
});
