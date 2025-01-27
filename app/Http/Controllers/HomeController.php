<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address;
use App\City;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ==========================================================================================================================

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // get the user id from Laravel Authentification
        $userIdFromAuth = auth()->user()->id;
        // find a user in database having that id 
        $user = \App\User::find($userIdFromAuth);

        if( is_null($user->address_id) ){
            $address = new Address;
        } else {
            $address = $user->address;
        }
        if( is_null($address->city_id) ){
            $city = new City;
        } else {
            $city = $user->address->city;
        }

        return view('home', array(
            'title' => 'MTM - Mon espace',
            'user' => $user,
            'address' => $address,
            'city' => $city
         ));
    }

    //! il faudra peut etre la virer, car la fonction au dessus fait la meme chose : 
    // ========================== VERS PROFILE ===============================
/*
    public function displayProfile()
    {
        // get the user id from Laravel Authentification
        $userIdFromAuth = auth()->user()->id;
        // find a user in database having that id 
        $user = \App\User::find($userIdFromAuth);

        return view('layout_extends.user.layout_ext_profile', array(
            'title' => 'MTM - Profile',
            'user' => $user
        ));
    }
*/
}
