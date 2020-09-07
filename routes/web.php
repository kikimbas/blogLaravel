<?php
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/profile', 'ProfileController@index')->name('profile-view');
//Route::get('/post/view_form', 'PostController@index')->name('view_form');
Route::get('/post/view_form', function () {
    return view('post/view_form');
})->name('view_form');

Route::get('/post/list_post', 'PostController@listOfPosts')->name('list_post');

Route::post('/post/add_post', 'PostController@add')->name('add_post');
Route::post('/profile/edit', 'ProfileController@edit')->name('profile-edit');

