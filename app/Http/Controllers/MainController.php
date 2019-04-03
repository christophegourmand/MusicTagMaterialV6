<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function displayHome()
    {
        // traitement
        return view('nomDossier.nomFichier', array(
            'title' => 'bienvenue sur la page HOME'
        ));
    }
}
