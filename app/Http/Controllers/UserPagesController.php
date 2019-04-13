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
                $user->lastname = $request->input('lastname');
                $user->phone = $request->input('phone');
            
            // country
                // todo : mettre le nom du pays en capitale
                $country = new Country;
                $country->name = strtoupper($request->input('country'));
                $country->save();
                
            // city and zipcode/postalcode :
                // todo : mettre le nom de la ville en capitale
                // todo 2 : chercher si la ville existe deja, ne pas la creer
                $city = new City;
                $city->name = strtoupper( $request->input('city') );
                $city->zipcode = $request->input('zipcode');
                $city->country_id = $country->id;
                $city->save();

            // address
                $address = new Address;
                $address->street = $request->input('street');
                $address->city_id = $city->id; 
                $address->save();

            // associate addresse with the user:
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
    }

    // ===================================================================================================

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // email: I chose 70, but Laravel arrives with 255., i still chose 191 for utf8mb4+unique limitation.
            // --- infos connection ---
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'], 
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            // --- infos public ---
            'name' => ['required', 'string', 'max:50', 'unique:users'],
            'avatar' => ['string', 'max:191'],
            // 'city' => ['required','string', 'max:100'],
            // 'zipcode' => ['string', 'max:10'],
            // 'country' => ['string', 'max:45'],

            // --- infos public ---
            // 'firstname' => ['required', 'string', 'max:50'],
            // 'lastname' => ['required', 'string', 'max:50'],
            // 'phone' => ['string', 'max:20'],
            // 'street' => ['required','string', 'max:50']
        ]);
    }
}
