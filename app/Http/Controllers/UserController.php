<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Category;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $user = Auth::user();
        $temp_address = explode(", ", $user->address);
        $address = [
            'street' => $temp_address[0],
            'civic' => $temp_address[1],
            'city' => $temp_address[2],
            'state' => $temp_address[3],
            'cap' => $temp_address[4],
        ];

        $categories = Category::all();

        return view('auth.edit', compact('user', 'address', 'categories'));
    }

    protected function getAddress($street, $number, $city, $state, $cap)
    {
        return $street . ", " . $number . ", " . $city . ", " . $state . ", " . $cap;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        if (Auth::user()->email == request('email')) {
            $this->validate(request(), [
                'business_name' => 'required|string|max:255|min:3',
                'categories' => 'exists:categories,id',
                'street' => 'required|string|max:160',
                'civic' => 'required|string|max:10',
                'city' => 'required|string|max:40',
                'state' => 'required|string|max:40',
                'cap' => 'required|numeric|digits:5',
                'p_iva' => 'required|numeric|digits:11',
                //'email' => 'required|string|email|max:255|unique:users',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2040',
            ]);

            $user->business_name = request('business_name');
            $user->address = $this->getAddress(request('street'), request('civic'), request('city'), request('state'), request('cap'));
            $user->p_iva = request('p_iva');
            //$user->email = request('email');

            $image = request('image');

            if (isset($image)) {
                $img_path = Storage::put('uploads', request('image'));
                $user->image = $img_path;
            }

            $user->save();

            $categories = request('categories');

            $user->categories()->sync(isset($categories) ? $categories : []);

            return redirect()->route('dashboard');
        } else {
            $this->validate(request(), [
                'business_name' => 'required|string|max:255|min:3',
                'categories' => 'exists:categories,id',
                'street' => 'required|string|max:160',
                'civic' => 'required|string|max:10',
                'city' => 'required|string|max:40',
                'state' => 'required|string|max:40',
                'cap' => 'required|numeric|digits:5',
                'p_iva' => 'required|numeric|digits:11',
                'email' => 'required|string|email|max:255|unique:users',
                'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2040',
            ]);

            $user->business_name = request('business_name');
            $user->address = request('address');
            $user->p_iva = request('p_iva');
            $user->email = request('email');

            $image = request('image');
            if (isset($image)) {
                $img_path = Storage::put('uploads', request('image'));
                $user->image = $img_path;
            }

            $user->save();

            $categories = request('categories');

            $user->categories()->sync(isset($categories) ? $categories : []);

            return redirect()->route('dashboard');
        }
    }

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
