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

//* =============  ROUTE AS 'GUEST' ==============
    Route::get('/', 'MainPagesController@displayMain')->name('page_main'); //* OK

    // Route::get('/registration', 'MainPagesController@displayRegistration')->name('page_registration'); //? OFF CAUSE already created automatically

    Route::get('/login', 'MainPagesController@displayLogin')->name('login'); //* OK

    Route::get('/test', 'TestController@test')->name('route_test');

    //? ROUTES 'guest' about Materials
        // Route::get('/materials', 'MaterialController@index')->name('page_materials_index');


//* =============  ROUTE AS 'AUTH' ONLY ==============
    //? ROUTES >> 'Auth' folder >> All Controllers >> All actions. 
        Auth::routes();

    //? ROUTES 'auth' authentification (logged-user access only)
        // Route::get('/profile', 'MainPagesController@displayProfile')->name('page_profile'); //* OK
        
        // route vers un page home appartenant au user ( = mon espace):
        Route::get('/home', 'HomeController@index')->name('home');
        
        // form for seller-informations:
        Route::get('/sellerform', 'UserPagesController@displaySellerForm')->name('page_seller_form')->middleware('auth');
        Route::post('/sellerform', 'UserPagesController@storeSellerForm')->name('store_seller_form')->middleware('auth');
    
    //? ROUTES 'auth' about Materials
        // Automatic creation of all roads going to >> MaterialController >> actions :
            Route::resource('materials', 'MaterialController');  // routes turned off so i can choose wich will use middleware.
    
        // Manual creation of each route : 
            // Route::get('/material/create', 'MainPagesController@displayMaterialCreate')->name('page_materialCreate');
            // SAME :
            // Route::get('/materials/create', 'MaterialController@create')->name('page_materials_create')->middleware('auth');
            // Route::post('/materials', 'MaterialController@store')->name('page_materials_store')->middleware('auth');
    
    //? ROUTES 'auth' about Brands
        // Automatic creation of all roads going to >> BrandController >> actions :
            Route::resource('brands', 'BrandController');

//* ============= INSPIRATION TO CREATE ROUTES ====================
    //? inspiration to create all Controller routes at once:
    /*  It could have been done with all controllers at once :
    Route::resources([
        'materials' => 'MaterialController',
        'Brands' => 'BrandController'
        ]);
    */
    
    //? inspiration from from official Laravel website:
    // Route::get($uri, $callback);
    // Route::post($uri, $callback);
    // Route::put($uri, $callback);
    // Route::patch($uri, $callback);
    // Route::delete($uri, $callback);
    // Route::options($uri, $callback);