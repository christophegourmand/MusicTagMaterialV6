<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        // traitement
        return view('layout_extends.user.layout_ext_profile', array(
            'title' => 'bienvenue sur la page PROFILE'
        ));
    }

    // ========================== VERS MONCOMPTE ===============================
    public function displayLogin()
    {
        // traitement
        return view('layout_extends.security.layout_ext_login', array(
            'title' => 'bienvenue sur la page LOGIN'
        ));
    }

    // ========================== VERS MATERIAL CREATE ===============================
    public function displayMaterialCreate()
    {
        // traitement
        return view('layout_extends.security.layout_ext_login', array(
            'title' => 'bienvenue sur la page MATERIAL CREATE'
        ));
    }


}
