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

Route::get('/', function () {
    return view('pages.welcome');
});

Route::get('contact', function () {

    return view('pages/contact');
})->name('contact');

Route::get('about', function () {

    return view('pages.about');
})->name('about');


Route::get('category/{id}', function ($id) {

    $categories = [
        '1'=> 'Games',
        '2'=> 'Books',
        '3'=> 'Programming'
    ];
    return view('pages.category', ['category'=> $categories[$id] ?? 'Undefined']);
})->name('category');


Route::resource('images', 'ImageController');   

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/post', 'PostController');
