<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Dish;

class DishController extends Controller
{
    protected $validation = [
        "name" => 'required|max:255',
        "ingredients" => 'required',
        "user_id" => 'nullable|exists:categories,id',
        "image" => 'nullable|mimes:jpeg,jpg,bmp,png|max:2040',
        'price' => "required|regex:/^\d+(\.\d{1,2})?$/",
        "visible" => 'boolean'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::where('user_id','=', Auth::id())->get();
        $categories = Category::all();

        return view('auth.dish.index', compact('dishes', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dish = Dish::all();

        return view('auth.dish.create', compact('dish'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate($this->validation);

        $data = $request->all();

        $newDish = new Dish;

        $newDish->fill($data);

        $user = Auth::user();
        $newDish->user()->associate($user);

        $image = request('image');
        if (isset($image)) {
            $img_path = Storage::put('uploads/dishes', request('image'));
            $newDish->image = $img_path;
        }

        $newDish->save();

        return redirect()->route('auth.dish.show', $newDish->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dish = Dish::findOrFail($id);

        return view('auth.dish.show', compact('dish'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dish = Dish::findOrFail($id);

        return view('auth.dish.edit', compact('dish'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $request->validate($this->validation);

        $data = $request->all();

        $image = request('image');
        if (isset($image)) {
            $img_path = Storage::put('uploads/dishes', request('image'));
            $data['image'] = $img_path;
        }

        $dish->update($data);

        return redirect()->route('auth.dish.show', $dish);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();

        return redirect()->route('auth.dish.index');
    }
}
