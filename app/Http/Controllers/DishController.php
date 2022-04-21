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
        "image" => 'nullable|mimes:jpeg,jpg,png|max:2040',
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
        $user = Auth::user();
        $dishes = Dish::where('user_id', '=', Auth::id())->get();
        $categories = Category::all();

        return view('auth.dish.index', compact('dishes', 'categories', 'user'));
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

        return redirect()->route('auth.dish.show', $newDish->id)->with(['serverMessage' => '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa-solid fa-xmark"></i></button> <strong>Piatto aggiunto correttamente</strong></div>']);;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if (!$dish = Dish::find($id)) {
            return abort(404);
        } elseif (Auth::user()->id == Dish::find($id)->user->id) {
            $dish = Dish::find($id);

            return view('auth.dish.show', compact('dish'));
        } else {
            $dish = Dish::findOrFail($id);

            return abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dish  $dish
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!$dish = Dish::find($id)) {
            return abort(404);
        } elseif (Auth::user()->id == Dish::find($id)->user->id) {
            $dish = Dish::find($id);

            return view('auth.dish.edit', compact('dish'));
        } else {
            $dish = Dish::findOrFail($id);

            return abort(404);
        }
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

        return redirect()->route('auth.dish.show', $dish)->with(['serverMessage' => '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa-solid fa-xmark"></i></button> <strong>Piatto modificato correttamente</strong></div>']);
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

        return redirect()->route('auth.dish.index')->with(['serverMessage' => '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa-solid fa-xmark"></i></button> <strong>Piatto rimosso correttamente</strong></div>']);
    }
}
