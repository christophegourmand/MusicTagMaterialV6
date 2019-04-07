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

//? inspiration from from official Laravel website:
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
Route::get('/test', 'TestController@test')->name('route_test');

//? création de toutes les routes pour les actions() du controller MaterialController:
    //! routes turned off so i can choose wich will use middleware.
    Route::resource('materials', 'MaterialController');
    Route::resource('brands', 'BrandController');
            /*  It could have been done with all controllers at once :
                    Route::resources([
                    'materials' => 'MaterialController',
                    'Brands' => 'BrandController'
                    ]);
            */

// Route::get('/materials', 'MaterialController@index')->name('page_materials_index');
// Route::get('/materials/create', 'MaterialController@create')->name('page_materials_create')->middleware('auth');
// Route::post('/materials', 'MaterialController@store')->name('page_materials_store')->middleware('auth');
    