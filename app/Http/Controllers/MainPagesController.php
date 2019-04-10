<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class MainPagesController extends Controller
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

    // =========================== VERS HOME =================================
    public function displayHome()
    {
        // traitement
        return view('layout_extends.layout_ext_home', array(
            'title' => 'bienvenue sur la page HOME'
        ));
    }
    
    // ========================= VERS INSCRIPTION ============================
    public function displayRegistration()
    {
        // traitement
        return view('layout_extends.security.layout_ext_registration', array(
            'title' => 'bienvenue sur la page REGISTRATION'
        ));
    }
    
    // ========================== VERS PROFILE ===============================
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

    // ========================== VERS MONCOMPTE ===============================
    public function displayLogin()
    {
        // traitement
        return view('layout_extends.security.layout_ext_login', array(
            'title' => 'MTM - Login'
        ));
    }

}
