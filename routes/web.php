<?php

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
    return view('welcome');
});

// search route placeholder for now until controller made
//return the name('search) allows for easy use in views when using action={{route('search)}}
// TODO implement searchcontroller
Route::any('/search', 'SearchController@show')->name('search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfilesController@index')->name('profile.index'); // When the user wants to view their own profile
Route::get('/profile/edit', 'ProfilesController@edit')->name('profile.edit'); // When a use wants to edit their own profile
Route::patch('/profile/update', 'ProfilesController@update')->name('profile.update'); // When the user submits their edits to their profile
Route::get('/profile/{user}', 'ProfilesController@show')->name('profile.show'); // When the user wants to view another user's profile
