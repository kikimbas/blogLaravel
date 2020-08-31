<?php
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/', 'HomeController@index')->name('home');

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/profile', 'ProfileController@index')->name('profile-view');
Route::post('/profile/edit', 'ProfileController@edit')->name('profile-edit');

