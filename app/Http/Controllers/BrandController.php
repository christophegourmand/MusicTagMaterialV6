<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // so we can use the middlware and check if user is logged.
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Brand;

class BrandController extends Controller
{

    public function __construct()
    {
        // Middle activation only on few roads/actions:
        $this->middleware('auth')->except(['index','show']);
    }

    // ==========================================================================================================================

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'FUNCTION BRANDS INDEX';
    }

    // ==========================================================================================================================

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout_extends.brand.layout_ext_brandCreate', array(
            'title' => 'MTM - Creer une Marque'
        ));
    }

    // ==========================================================================================================================

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // validation of forms fields : //todo : de-commenter ca plus tard
/*         
            $this->validate($request, [
                'brand_name' => 'required',
                'brand_photo' => 'image|nullable|max:1999' // image limit just under 2Mo  //? METHODE 1 ...... Youtube Traversy Media
            ]);  
*/

        // Storage::putFile('brand_photo', new File('/dossierBrand/')); //? METHODE 2 ...... sur Laravel

        // $file = $request->file('brand_photo'); //? METHODE 3 ......... sur laravel..FONCTIONNE
        // $file = $request->file('brand_photo')->store('photos'); //? METHODE 3 ......... sur laravel.... FONCTIONNE

        // now we handle file upload:
        if(! is_null($request->file('brand_photo')) )   //? METHODE 1 ...... Youtube Traversy Media
        {
            $folderName = 'img/brand';
            $fileUploaded = $request->file('brand_photo');


            // get filename with the extension: 
            $fileNameWithExtension = $request->file('brand_photo')->getClientOriginalName();
            //get just filename:
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            // get just extension
            $extension = $request->file('brand_photo')->getClientOriginalExtension();
            
            // filename to store:
            $fileNameToStore = 'brand'.'_'.$fileName.'.'.$extension;
            // upload image:
            //$path = $request->file('brand_photo')->storeAs('brands_images', $fileNameToStore); //? V1) works to store in '\storage\' but i prefer to store in '\public\storage\'

            //? V2) it try  2nd method
            // Storage::disk('public')->put('brand_photos', $request->file('brand_photo')); //? works but the filename is encoded.
            
            //? V3) it upload the file in '\public\storage\' with correct filename 
            Storage::disk('public')->putFileAs($folderName, $fileUploaded, $fileNameToStore);

        } else {

            $fileNameToStore = 'noimage.jpg'; // todo: store a default file in case we don't have images. 

        }

        // creation of 'brand' instance :
        $brand = new Brand;
        $brand->name = $request->input('brand_name');
        
        $brand->photo = $fileNameToStore; //? METHODE 1 ...... Youtube Traversy Media

        $brand->save();

        return redirect('/brands/create')->with('success', 'La Marque a ete cree');

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
        return view('layout_extends.brand.layout_ext_brandShow', array(
            'title' => 'MTM - Voir une Marque'
        ));
    }

    // ==========================================================================================================================

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('layout_extends.brand.layout_ext_brandForm', array(
            'title' => 'MTM - Creer une Marque'
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
        //
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
        //
    }
}
