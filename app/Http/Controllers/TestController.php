<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // added by teacher, still works without.
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // so we can use the middlware and check if user is logged.
use App\Material;
use App\Brand;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        echo 'Fonction de test';

        // instructions...
        $routes = collect(\Route::getRoutes())
                ->map(
                    function($route)
                    { 
                        return $route->uri();
                    }
                );

        echo '<pre>';
            var_dump($routes);
        echo '</pre>';
        exit('END');
    }
}
