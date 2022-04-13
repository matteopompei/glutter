<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Category;
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

    // Ritorna il form di registrazione
    protected function getRegisterForm()
    {
        $categories = Category::all();
        return view('auth.register')->with('categories', $categories);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // Valida gli elementi del form
        return Validator::make($data, [
            'business_name' => ['required', 'string', 'max:255', 'min:3'],
            'categories' => 'exists:categories,id',
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

    // Ritorna indirizzo concatenando strada, numero, città, provincia e cap
    protected function getAddress($street, $number, $city, $state, $cap)
    {
        return $street . ", " . $number . ", " . $city . ", " . $state . ", " . $cap;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // Crea un nuovo utente con business_name, address, p_iva, email, password
        $new_user = User::create([
            'business_name' => $data['business_name'],
            'address' => $this->getAddress($data['street'], $data['civic'], $data['city'], $data['state'], $data['cap']),
            'p_iva' => $data['p_iva'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        //Se $data['categories'] è settato ne fa il sync, altrimenti lo fa con un array vuoto
        $new_user->categories()->sync(isset($data['categories']) ? $data['categories'] : []);
        return $new_user;
    }
}
