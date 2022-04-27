<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Category;
use App\Dish;
use App\Order;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', '=', Auth::id())->get();
        $categories = Category::all();

        return view('auth.order.index', compact('orders', 'categories', 'user'));
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
    public function show(Order $order)
    {
        $user = Auth::user();
       

        if ($order->user_id == $user->id) {
            return view('auth.order.show', compact('order'));
        } else {
            return abort(404);
        }

        // if (!$order = Order::findOrFail($order->id)) {
        //     return abort(404);
        // } elseif ($order = Order::find($order->showid)->where('user_id', Auth::id())->first()) {
        //     return view('auth.order.show', compact('order'));
        // } else {
        //     return abort(404);
        // }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('auth.order.index')->with(['serverMessage' => '<div class="alert alert-success" role="alert"><button type="button" class="close" data-dismiss="alert"><i class="fa-solid fa-xmark"></i></button> <strong>Ordine rimosso correttamente</strong></div>']);
    }
}
