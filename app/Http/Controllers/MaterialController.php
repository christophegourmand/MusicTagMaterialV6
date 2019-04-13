<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // added by teacher, still works without.
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // so we can use the middlware and check if user is logged.
use App\Material;
use App\Brand;
use App\Photo;
use App\Audio;
use App\Video;

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
        //todo plus tard renommer en createForm() ou showCreateForm()
        // Get a collection of brands from database:
        $brands = \App\Brand::all()->sortBy('name');
        $categories = \App\Category::all();//->sortBy('name');
        $materialToEdit = new Material;

        // TODO : ici ajouter les infos du material à vide
     
        return view('layout_extends.material.layout_ext_materialCreate', array(
            'title' => 'bienvenue sur la page MATERIAL CREATE',
            // 'actionAsking' => 'materials.create',
            'brands' => $brands,
            'categories' => $categories,
            'materialToEdit' => $materialToEdit,
            'submitActionMethod' => 'POST',
            'submitActionRoute' => route('materials.store'),
            'submitButtonName' => 'Valider les changements'
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
        // validation of forms fields
        $this->validate($request, [
            'material_brand_id' => 'required',
            'material_productmodel' => 'required',
            'material_price' => 'required'
            // todo: here put 'photofile' => 'image|'
            ]);
            
        $userIdFromAuth = auth()->user()->id;
        // -------------------------------------------------------------------------------------
    
        // -------------------------------------------------------------------------------------
        // creation of 'material' instance, then save informations form the request into a new Material tuple in database
        $material = new Material;
        $material->brand_id = $request->input('material_brand_id');
        $material->productmodel = $request->input('material_productmodel');
        $material->builtyear = $request->input('material_builtyear');
        $material->description = $request->input('material_description');
        $material->price = $request->input('material_price');
        $material->user_id = auth()->user()->id; //todo remplacer plus tard par $userIdFromAuth
        $material->save();
            
        // -------------------------------------------------------------------------------------
        if(! is_null($request->file('material_photo_1')) )   //? METHODE 1 ...... Youtube Traversy Media
        {
            $folderName = 'img/material';
            $fileUploaded = $request->file('material_photo_1');
            // $fileNameWithExtension = $request->file('material_photo_1')->getClientOriginalName();
            // $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            $extension = $request->file('material_photo_1')->getClientOriginalExtension();
            
            // here i decide to compose a name with u- (for user) _ m- (for material) _ 
            $fileNameToStore = 'u-'.$userIdFromAuth.'_'.'m-'.$fileName.'.'.$extension;
            Storage::disk('public')->putFileAs($folderName, $fileUploaded, $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg'; // todo: store a default file in case we don't have images. 
        }

        // creation of 'brand' instance :
        $photo1 = new Photo;
        $photo1->name = $request->input('material_photo_1');
        
        $photo1->photo = $fileNameToStore; //? METHODE 1 ...... Youtube Traversy Media

        $photo1->save();

        // -------------------------------------------------------------------------------------

        // display the edited Material 's page : 
        return redirect()->route('materials.show', $material->id);
    
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
        $materialToShow = \App\Material::find($id);
        
        // $brand = $materialToShow->brands()->where('brand_id',5);
        // $materialToShow->brand_id; //? renvoi bien 5
        $materialToShow->brand->name; //? renvoi bien le nom de la marque
        // echo '<pre>';
        // var_dump($materialToShow->brand->name);
        // echo '</pre>';
        // exit('END');

        // todo: si user_id  est egale au  material->user_id
            // passer dans la vue la route pour faire un 'edit' + et passer le material_id aussi
            // afficher un bouton modifier permettant de faire l'edit

        return view('layout_extends.material.layout_ext_materialShow', array(
            'title' => 'bienvenue sur la page MATERIAL SHOW',
            'routeName' => 'materials.update',
            'materialToShow' => $materialToShow,
            'brandToShow' => $materialToShow->brand->name,  //! peut être que je vais virer ça et le faire dans la vue
            'submitActionRoute' => route('materials.update', $id),
            'submitButtonName' => 'Valider les changements'
        ));
    }

    /**
     * Retrieve the material by id and the brand collection then display the form to edit the material
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Get a collection of brands from database:
        $brands = \App\Brand::all()->sortBy('name');

        // Get the Material by id from the database
        $materialToEdit = \App\Material::find($id);

        return view('layout_extends.material.layout_ext_materialCreate', array(
            'title' => 'bienvenue sur la page MATERIAL CREATE',
            'routeName' => 'materials.update',
            'brands' => $brands,
            'materialToEdit' => $materialToEdit,
            'submitActionMethod' => 'PUT',
            'submitActionRoute' => route('materials.update', $id),
            'submitButtonName' => 'Valider les changements'
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
        // here we retrieve again the material to update.
        $materialToEdit = \App\Material::find($id);

        // save informations form the request into the edited Material tuple in database
        $material->brand_id = $request->input('material_brand_id');
        $material->productmodel = $request->input('material_productmodel');
        $material->builtyear = $request->input('material_builtyear');
        $material->description = $request->input('material_description');
        $material->price = $request->input('material_price');
        $material->user_id = auth()->user()->id;
        $material->save();
        
        // display the edited Material 's page : 
        return redirect()->route('materials.show', $id);

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
