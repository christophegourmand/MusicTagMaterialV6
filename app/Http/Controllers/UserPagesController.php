<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
// all use i added :
// namespace App\Http\Controllers\Auth;   // was in the register controller. i think not necessary
use Illuminate\Foundation\Auth\RegistersUsers; // was in the register controller. i think not necessary
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Country;
use App\City;
use App\Address;

class UserPagesController extends Controller
{
    // I did copy here the construct with middleware check, so it can check if you are logged in.

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // ===================================================================================================
    // ===================================================================================================

    /**
     * Display form for seller informations
     *
     * @return \Illuminate\Http\Response
     * @Middleware("auth.basic")
     */
    public function displaySellerForm()
    {   

        
        
        
        // get connected user id
        $userIdFromAuth = auth()->user()->id; //int
        
        // find a user in database having that id 
        $user = \App\User::find($userIdFromAuth);
        
        //* si les informations du users ont deja ete saisies, alors va directement sur le formulaire de creation de material:
        //* se servir de ca :
            /*
            $user->name
            $user->email
            $user->firstname
            $user->lastname
            $user->phone
            $user->avatar
            $user->address->street
            $user->address->city->name
            $user->address->city->zipcode
            */
        
        
            // here we prepare the fields (1) with the values if they exist (OR) without empty string if doesnt exist
        
        /*
        $user->firstname;
        if(isset($user->firstname)){}
        
        $user->lastname;
        $user->phone;
        $user->address()->name; // besoin de ->get()->name
        */


        return view('layout_extends.user.layout_ext_formSellerInfos', array(
            'title' => 'Informations necessaires pour vendre du materiel',
            'submitActionMethod' => 'POST',
            'submitActionRoute' => route('store_seller_form'),
            // 'submitButtonName' => 'Valider les changements',
            'user' => $user
        ));
        
    }
    

    // ===================================================================================================


    /**
     * Store information required for a user to sell
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function storeSellerForm(Request $request)
    {   
        // dd($request); // 💀🔺

        // validation of forms fields
        $this->validate($request, [
            // --- public infos ---
            'city' => ['required','string', 'max:100'],
            'zipcode' => ['required', 'string', 'max:10'],
            'country' => ['required', 'string', 'max:45'],

            // --- infos visible by buyer only ---
            'firstname' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'phone' => ['required', 'string', 'max:20'],
            'street' => ['required','string', 'max:50']
        ]);

        // get connected user id
        $userIdFromAuth = auth()->user()->id; //int

        // find a user in database having that id 
        $user = \App\User::find($userIdFromAuth);
    
        
        // -------------------------------------------------
        // saving fields from the form
        
        // user table informations
            $user->firstname = $request->input('firstname');
            $user->lastname = strtoupper($request->input('lastname'));
            $user->phone = $request->input('phone');
            
        // Retrieve country by name, or create it if it doesn't exist...
            $country = \App\Country::firstOrCreate(
                ['name' =>  strtoupper($request->input('country')) ]
            );
            
        // Retrieve City by 'zipcode', or create it if it doesn't exist...
            $city = \App\City::firstOrCreate(
                ['zipcode' =>  strtoupper($request->input('zipcode'))  ], // search if that one already exist
                
                [
                    'name' => strtoupper($request->input('city')), 
                    'country_id' => $country->id
                ]
            );
                
        // Retrieve Address by 'street' field, or create it if it doesn't exist...
            $address = \App\Address::firstOrCreate(
                ['street' => $request->input('street')  ],
                
                [  
                    'city_id' => $city->id
                ]
            );

        // associate address with the user:
                $user->address_id = $address->id;
                $user->save();


            // $address->users()->associate($user); // doesnt works 
            // OR perhaps it could be like that:
                // $address->city()->save($city);
                // $address->city()->country()->save($country);

            /*  EXAMPLE :: 
            $address->productmodel = $request->input('material_productmodel');
            $address->builtyear = $request->input('material_builtyear');
            $address->description = $request->input('material_description');
            $address->price = $request->input('material_price');
            $address->user_id = auth()->user()->id; //todo remplacer plus tard par $userIdFromAuth
            $address->save();
            */   

            return redirect()->route('materials.create');
    }

}
