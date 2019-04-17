<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // added by teacher, still works without.
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // so we can use the middlware and check if user is logged.
//? used to upload the fils (amterials photos)
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
        $materials = \App\Material::all()->sortByDesc('created_at');
        
        // echo '<pre>';
        //     var_dump($materials);
        // echo '</pre>';
        // exit('END');


        return view('layout_extends.material.layout_ext_materialIndex', array(
            'title' => 'MusicTagMaterial - Annonces Recentes',
            'materials' => $materials,
            // 'material' => $material,
            // 'brand' => $brand,
            // 'user' => $user,
            // 'city' => $city,
            // 'photos' => $photos,
            // 'photo1' => $photo1, //! temporary
            // 'assetPath' => $assetPath,
            // 'routeName' => 'materials.update',
            // 'submitActionRoute' => route('materials.update', $id),
            // 'submitButtonName' => 'Valider les changements'
        ));

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
        $material = new Material;
        $brand = new Brand;
        // $material->brand_id = $brand->id; // inutile je pense
        $photo1 = new Photo;

        // TODO : ici ajouter les infos du material à vide
     
        return view('layout_extends.material.layout_ext_materialCreate', array(
            'title' => 'bienvenue sur la page MATERIAL CREATE',
            // 'actionAsking' => 'materials.create',
            'brands' => $brands,       //todo later, try with jQuery to auto-complete after each keydown.
            'brand' => $brand,
            'categories' => $categories,
            'material' => $material,
            'photo1' => $photo1,
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
            'material_productmodel' => 'required',
            'material_price' => 'required',
            'material_brand' => 'required',
            'material_photo1_file' => 'image'
        ]);
            
        $userIdFromAuth = auth()->user()->id;
        // -------------------------------------------------------------------------------------
        // Retrieve brand by name, or create it if it doesn't exist...
        $brand = \App\Brand::firstOrCreate(
            ['name' =>  strtoupper($request->input('material_brand')) ]
        );
    
        // -------------------------------------------------------------------------------------
        // creation of 'material' instance, then save informations form the request into a new Material tuple in database
        $material = new Material;
        $material->brand_id = $brand->id;
        $material->productmodel = $request->input('material_productmodel');
        $material->builtyear = $request->input('material_builtyear');
        $material->description = $request->input('material_description');
        $material->price = $request->input('material_price');
        $material->user_id = $userIdFromAuth;
        $material->save();
            
        // -------------------------------------------------------------------------------------
        // if( !is_null($request->file('material_photo1_file')) )   //? METHODE 1 ...... Youtube Traversy Media
        // {
            $folderName = 'img/material';
            $fileUploaded = $request->file('material_photo1_file');

            // get filename with the extension: 
            $fileNameWithExtension = $request->file('material_photo1_file')->getClientOriginalName();
            //get just filename:
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('material_photo1_file')->getClientOriginalExtension();

            // filename to store: (here i decide to compose a name with u- (for user) _ m- (for material) _ )
            $fileNameToStore = 'u-'.$userIdFromAuth.'_'.'m-'.$fileName.'.'.$extension;
            
            //? upload the file in '\public\storage\' with correct filename 
            Storage::disk('public')->putFileAs($folderName, $fileUploaded, $fileNameToStore);
        // } else {
        //     $fileNameToStore = 'noimage.jpg'; // todo: store a default file in case we don't have images. 
        // }

        // creation of 'photo' instance :
        $photo1 = new Photo;
        // $photo1->file = $request->input('material_photo1_file'); // not correct, I will use the filename prepared earlier instead :
        $photo1->file = $fileNameToStore; //? METHODE 1 ...... Youtube Traversy Media
        $photo1->description = $request->input('material_photo1_description');
        $photo1->material_id = $material->id;

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
        $material = \App\Material::find($id);
        
        // $brand = $material->brands()->where('brand_id',5);
        // $material->brand_id; //? renvoi bien 5

        $brand = $material->brand; //? renvoi bien le nom de la marque
        $photos = $material->photos;
        
        // i retrieve temporarly the first photo:
        $photo1 = $photos[0]; //! temporary
        
        $assetPath = "storage/img/material/".$photo1->file."";
                
        $user = $material->user;
        $city = $user->address->city;

        // todo: si user_id  est egale au  material->user_id
            // passer dans la vue la route pour faire un 'edit' + et passer le material_id aussi
            // afficher un bouton modifier permettant de faire l'edit

        return view('layout_extends.material.layout_ext_materialShow', array(
            'title' => 'bienvenue sur la page MATERIAL SHOW',
            'material' => $material,
            'brand' => $brand,
            'user' => $user,
            'city' => $city,
            'photos' => $photos,
            'photo1' => $photo1, //! temporary
            'assetPath' => $assetPath,
            'routeName' => 'materials.update',
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
        // $brands = \App\Brand::all()->sortBy('name');

        // Get the Material by id from the database
        $material = \App\Material::find($id);
        $brand = $material->brand;


        return view('layout_extends.material.layout_ext_materialCreate', array(
            'title' => 'bienvenue sur la page MATERIAL CREATE',
            'routeName' => 'materials.update',
            // 'brands' => $brands,
            'material' => $material,
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
        $material = \App\Material::find($id);

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
