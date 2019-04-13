<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

// METHOD 3 : i try to add the namespaces to instance Country, City, and Address:
use App\Country;
use App\City;
use App\Address;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

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
            'city' => ['required','string', 'max:100'],
            'postalcode' => ['string', 'max:10'],
            'country' => ['string', 'max:45'],
            // --- infos public ---
            'firstname' => ['required', 'string', 'max:50'],
            'lastname' => ['required', 'string', 'max:50'],
            'phone' => ['string', 'max:20'],
            'street' => ['required','string', 'max:50']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Get a collection of countries from database:
        // $countries = \App\Country::all()->sortBy('name');
        
/* METHOD 2 :  didnt work, i just tried 
        $country = Country::create([
        'name' => $data['country']
        ]);

        $city = City::create([
        'name' => $data['city']
        ]);
 */

/*  METHOD 1:  worked before new fields, but i'
        return User::create([
            // dd($data);
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'lastname' => $data['lastname'],
            'firstname' => $data['firstname'],
            'phone' => $data['phone'],
            'avatar' => $data['avatar']
            // 'countries' => $countries
            // todo ici essayer d'intégrer les données adresse, ville et pays dans pour les stocker dans la database.
            ]);
*/

    // METHOD 3 :

    $country = new Country;
    $country->name = $request->input('country');
    $country->save();


    $city = new City;
    $city->name = $request->input('city');
    $city->country_id = $country->id;
    $city->save();
    
    $address = new Address;
    $address->street = $request->input('street');
    $address->city_id = $city->id;
    $address->save();

    $user = new User;
    $user->email = $request->input('email');
    $user->password = $request->input('password');
    $user->name = $request->input('name');
    $user->avatar = $request->input('avatar');
    $user->firstname = $request->input('firstname');
    $user->lastname = $request->input('lastname');
    $user->phone = $request->input('phone');

    $user->address_id = $address->id;
    $user->save();
    
    return $user;

    }
}
