<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Category;
use Illuminate\Http\Request;
use App\Dish;

class DishController extends Controller
{
    protected $validation = [
        "name" => 'required|max:255',
        "ingredients" => 'required',
        "user_id" => 'nullable|exists:categories,id',
        "image" => 'nullable|mimes:jpeg,jpg,bmp,png',
        "price" => 'numeric',
        "visible" => 'boolean'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dishes = Dish::all();
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
        $categories = Category::all();

        return view('auth.dish.create', compact('categories'));
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
        $newDish->visible = true;
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
        $dish = Dish::find($id);

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
        $dish = Dish::find($id);

        $categories = Category::all();

        return view('auth.dish.edit', compact('dish', 'categories'));
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

        $dish->update($data);

        $dish->categories()->sync($data);

        return redirect()->route('auth.dish.show', $dish);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dish = Dish::find($id);

        $dish->delete();

        return redirect()->route('auth.dish.index');
    }
}
