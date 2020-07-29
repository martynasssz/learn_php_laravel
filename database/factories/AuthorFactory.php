<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Author;
use Faker\Generator as Faker;

$factory->define(Author::class, function (Faker $faker) {
    return [
        //
    ];
});

$factory->afterCreating(App\Author::class, function ($author, $faker) { //callback
    $author->profile()->save(factory(App\Profile::class)->make()); // this function will be called when new author created and saved;
});

// $factory->afterMaking(App\Author::class, function ($author, $faker) { //callback
//     $author->profile()->save(factory(App\Profile::class)->make()); // this case  a function will be called after the new instance of author model was instatiated, bet it wan't saved yet.
// });

