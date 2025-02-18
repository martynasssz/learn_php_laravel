<?php

use Illuminate\Support\Facades\Auth;
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



Route::get('/', 'HomeController@home')
    ->name('home')
    //->middleware('auth');//when we are home we shoud connect, it is because is middleware
    
    ;
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::resource('/posts', 'PostController');

Auth::routes();