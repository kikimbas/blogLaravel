<?php
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['web']], function () {
    Route::group(['middleware' => ['auth']], function () {

        Route::get('/', 'HomeController@index')->name('home');

        Route::get('/profile', 'ProfileController@index')->name('profile-view');
        Route::get('/post/view_form', 'ObjectsController@index')->name('view_form');

        Route::get('/post/list_post', 'ObjectsController@listOfPosts')->name('list_post');

        Route::match(['get', 'post'], '/post/edit/{id}', 'ObjectsController@postEdit')->name('post_edit');

        Route::post('/post/add_object', 'ObjectsController@add')->name('add_object');
        Route::post('/profile/edit', 'ProfileController@edit')->name('profile-edit');
    });
});

Auth::routes();

//Route::get('/', function () {
//    return view('welcome');
//});

