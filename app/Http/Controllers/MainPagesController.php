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
        $this->middleware('guest');
    }

    // =========================== VERS HOME =================================
    public function displayMain()
    {
        // traitement
        return view('layout_extends.layout_ext_main', array(
            'title' => 'MusicTagMaterial - Accueil'
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
