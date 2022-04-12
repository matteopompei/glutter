<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    // Crea indirizzo
    protected function getAddress($street, $number, $city, $state, $cap)
    {
        return $street . ", " . $number . ", " . $city . ", " . $state . ", " . $cap;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // modifica dati da validare. Aggiunti p_iva, address, business_name
        return Validator::make($data, [
            'business_name' => ['required', 'string', 'max:255', 'min:3'],
            'street' => ['required', 'string', 'max:160'],
            'civic' => ['required', 'string', 'max:10'],
            'city' => ['required', 'string', 'max:40'],
            'state' => ['required', 'string', 'max:40'],
            'cap' => ['required', 'numeric', 'digits:5'],
            'p_iva' => ['required', 'numeric', 'digits:11'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        // modifica dati da creare. Aggiunti p_iva, address, business_name
        return User::create([
            'business_name' => $data['business_name'],
            'address' => $this->getAddress($data['street'], $data['civic'], $data['city'], $data['state'], $data['cap']),
            'p_iva' => $data['p_iva'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
