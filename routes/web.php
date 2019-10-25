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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');

Route::get('/about', function () {
    return view('about');
})->name('/');

// search route placeholder for now until controller made
//return the name('search) allows for easy use in views when using action={{route('search)}}
// TODO implement searchcontroller
Route::any('/search', 'SearchController@show')->name('search');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('profile')->group(function () {
    Route::get('/', 'ProfilesController@index')->name('profile.index'); // View own profile if logged in
    Route::get('/edit', 'ProfilesController@edit')->name('profile.edit'); // Edit profile
    Route::patch('/update', 'ProfilesController@update')->name('profile.update'); // Updates changes to profile
    Route::get('/{user}', 'ProfilesController@show')->name('profile.show'); // View profile based on id
});

Route::prefix('job')->group(function () {
    Route::post('/', 'JobsController@store')->name('job.index');
    Route::get('/create', 'JobsController@create')->name('job.create');
    Route::get('/{job}/edit', 'JobsController@edit')->name('job.edit');
    Route::patch('/update', 'JobsController@update')->name('job.update');
    Route::get('/{job}', 'JobsController@show')->name('job.show');
});
