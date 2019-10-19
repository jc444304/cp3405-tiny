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
})->name('/');

// search route placeholder for now until controller made
//return the name('search) allows for easy use in views when using action={{route('search)}}
// TODO implement searchcontroller
Route::any('/search', 'SearchController@show')->name('search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('profile')->group(function () {
    Route::get('/', 'ProfilesController@index')->name('profile.index'); // When the user wants to view their own profile
    Route::get('/edit', 'ProfilesController@edit')->name('profile.edit'); // When a use wants to edit their own profile
    Route::patch('/update', 'ProfilesController@update')->name('profile.update'); // When the user submits their edits to their profile
    Route::get('/{user}', 'ProfilesController@show')->name('profile.show'); // When the user wants to view another user's profile
});

Route::prefix('job')->group(function () {
    Route::get('/{job}', 'JobsController@show');
    Route::get('/create', 'JobsController@create')->name('job.create');
    Route::post('/', 'JobsController@store');
});
