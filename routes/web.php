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

// ! ============================================ 


//? mes routes:

Route::get('/', 'MainPagesController@displayHome')->name('page_home'); //* OK

Route::get('/registration', 'MainPagesController@displayRegistration')->name('page_registration'); //* OK
Route::get('/profile', 'MainPagesController@displayProfile')->name('page_profile'); //* OK
Route::get('/login', 'MainPagesController@displayLogin')->name('page_login'); //* OK

// Route::get('/material/create', 'MainPagesController@displayMaterialCreate')->name('page_materialCreate');

//? from Marie:
// Route::get('/', 'Shop\MainController@index')->name('homepage');

//? from official:
// Route::get($uri, $callback);
// Route::post($uri, $callback);
// Route::put($uri, $callback);
// Route::patch($uri, $callback);
// Route::delete($uri, $callback);
// Route::options($uri, $callback);

// création de toutes les routes pour les actions() des controllers du dossier Auth:
Auth::routes();

// route vers un page home appartenant au user ( = mon espace):
Route::get('/home', 'HomeController@index')->name('home');

// création de toutes les routes pour les actions() du controller MaterialsController:
Route::resource('material', 'MaterialsController');