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

//? LARAVEL DEMARRAGE:
Route::get('/welcome', function () {
    return view('welcome');
});

//? mes routes:
Route::get('/', 'MainController@displayHome')->name('homepage');




//? from Marie:
// Route::get('/', 'Shop\MainController@index')->name('homepage');

//? from official:
// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);