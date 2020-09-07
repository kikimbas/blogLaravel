<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['auth']], function () {

        Route::get('/', 'HomeController@index')->name('home');

        Route::get('/profile', 'ProfileController@index')->name('profile-view');
        Route::get('/post/view_form', 'PostController@index')->name('view_form');

        Route::get('/post/list_post', 'PostController@listOfPosts')->name('list_post');
        Route::get('/post/list_post', 'PostController@listOfPosts')->name('list_post');

        Route::match(['get', 'post'], '/post/edit/{id}', 'PostController@postEdit')->name('post_edit');

        Route::post('/post/add_post', 'PostController@add')->name('add_post');
        Route::post('/profile/edit', 'ProfileController@edit')->name('profile-edit');
    });
});

Auth::routes();

//Route::get('/', function () {
//    return view('welcome');
//});

