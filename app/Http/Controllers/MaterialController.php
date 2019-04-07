<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // added by teacher, still works without.
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // so we can use the middlware and check if user is logged.
use App\Material;
use App\Brand;

class MaterialController extends Controller
{
    public function __construct()
    {
        // Middle activation only on few roads/actions:
        $this->middleware('auth')->except(['index','show']);
        // $this->middleware('csrf'); // not sure if we can do that, and if it's required
    }

    // ==========================================================================================================================

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'FUNCTION INDEX'; 
    }

    // ==========================================================================================================================

    /**
     * Affiche la vue avec formulaire de création d'une annonce de matériel
     *
     * @return \Illuminate\Http\Response
     * @Middleware("auth.basic")
     */
    public function create()
    {
        // Get a collection of brands from database:
        $brands = \App\Brand::all()->sortBy('name');
     
        return view('layout_extends.material.layout_ext_materialCreate', array(
            'title' => 'bienvenue sur la page MATERIAL CREATE',
            // 'actionAsking' => 'materials.create',
            'submitActionMethod' => 'POST',
            'submitActionRoute' => route('materials.store'),
            'brands' => $brands
        ));
 
    // ==========================================================================================================================
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // validation of forms fields : 
            $this->validate($request, [
                'material_brand_id' => 'required',
                'material_productmodel' => 'required',
                'material_price' => 'required'
                // todo: here put 'photofile' => 'image|'
            ]);
    
            // creation of 'material' instance :
            $material = new Material;
            $material->brand_id = $request->input('material_brand_id');
            $material->productmodel = $request->input('material_productmodel');
            $material->builtyear = $request->input('material_builtyear');
            $material->description = $request->input('material_description');
            $material->price = $request->input('material_price');
            $material->user_id = auth()->user()->id;

            $material->save();
    
    }

    // ==========================================================================================================================

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'FUNCTION SHOW'; 
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get a collection of brands from database:
        $brands = \App\Brand::all()->sortBy('name');

        // TODO : ici ajouter les infos du material

        return view('layout_extends.material.layout_ext_materialCreate', array(
            'title' => 'bienvenue sur la page MATERIAL CREATE',
            'routeName' => 'materials.update',
            'brands' => $brands
        ));
        
    }

    // ==========================================================================================================================

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        echo '<pre>';
            var_dump('on est dans update');
        echo '</pre>';
        exit('END');
    }

    // ==========================================================================================================================

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return 'FUNCTION DESTROY'; 
        
    }
}
