<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BlogPost;
use Faker\Generator as Faker;

$factory->define(BlogPost::class, function (Faker $faker) {
    return [
        'title' =>$faker->sentence(10), //sentence with 10 words;
        'content'=>$faker->paragraphs(5, true) // 5 word, true, because we won't return a text;
    ];
});

$factory->state(App\BlogPost::class, 'new-title', function(Faker $faker) {
    return [
        'title' => 'New title', //overwrite faker's generated title
       // 'content' =>'Content of the blog post' //overwrite faker's generated content
    ];

    
});
