<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () { //the same as view method
//     return view('home');
// });

Route::view('/', 'home')->name('home');

// Route::get('/contact', function() {
//     return view('contact');
// });

Route::view('/contact', 'contact')->name('contact');

// Route::get('/blog-post/{blog-post-id}/{author}', function ($id, $authorName) {
//     return $id. $authorName;
// });

Route::get('/blog-post/{id}/{welcome?}', function ($id, $welcome = 1) {
    $pages = [   //simple variable an asociative array
        1 => [   //key as id
            'title' => 'from page 1'
        ],
        2 => [   //key as id
            'title' => 'from page 2'
        ],
    ];
    $welcomes = [1 => 'Hello ', 2 => 'Welcome to ']; //optina paramenter

    return view('blog-post',
        ['data'=>$pages[$id], 
        'welcome' =>  $welcomes[$welcome],
    ]); //blog-post is function that will be rendered
})->name('blog-post');