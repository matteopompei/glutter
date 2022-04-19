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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();

        // Splitta la stringa dell'address in array
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

    // Ritorna una stringa formattata per l'indirizzo
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
    public function update(Request $request)
    {
        $user = Auth::user();

        // Valida la richiesta controllando se è stata modificata l'email
        if ($user->email == $request['email']) {
            $request->validate([
                'business_name' => 'required|string|max:255|min:3',
                'categories' => 'exists:categories,id',
                'street' => 'required|string|max:160',
                'civic' => 'required|string|max:10',
                'city' => 'required|string|max:40',
                'state' => 'required|string|max:40',
                'cap' => 'required|numeric|digits:5',
                'p_iva' => 'required|numeric|digits:11',
            ]);
            $form_data = $request->all();
        } else {
            $request->validate([
                'business_name' => 'required|string|max:255|min:3',
                'categories' => 'exists:categories,id',
                'street' => 'required|string|max:160',
                'civic' => 'required|string|max:10',
                'city' => 'required|string|max:40',
                'state' => 'required|string|max:40',
                'cap' => 'required|numeric|digits:5',
                'p_iva' => 'required|numeric|digits:11',
                'email' => 'required|string|email|max:255|unique:users',
            ]);
            $form_data = $request->all();
            $user->email = $form_data['email'];
        }

        // Aggiorna il business name
        $user->business_name = $form_data['business_name'];

        // Aggiorna le categorie
        $user->categories()->sync(isset($form_data['categories']) ? $form_data['categories'] : []);

        // Aggiorna l'indirizzo
        $user->address = $this->getAddress($form_data['street'],  $form_data['civic'], $form_data['city'],  $form_data['state'],  $form_data['cap']);

        // Aggiorna la partita iva
        $user->p_iva = $form_data['p_iva'];

        // Salva
        $user->save();
        return redirect()->route('dashboard');
    }

    // Aggiorna l'immagine del profilo
    public function imageUpdate(Request $request)
    {
        $user = Auth::user();

        // Valida l'immagine
        $request->validate([
            'image' => 'nullable|mimes:jpg,jpeg,png|max:2040',
        ]);

        //Imposta l'immagine
        $image = $request['image'];
        if (isset($image)) {
            $img_path = Storage::put('uploads', $request['image']);
            $user->image = $img_path;
        }

        $user->save();
        return redirect()->route('dashboard');
    }

    // Rimuove l'immagine del profilo
    public function imageRemove()
    {
        $user = Auth::user();
        $user->image = null;

        $user->save();
        return redirect()->route('dashboard');
    }
}
