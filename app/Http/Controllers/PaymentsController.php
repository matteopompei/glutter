<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Order;
use Braintree;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    protected $validation = [
        'fullName' => 'required|max:255',
        'street' => 'required|string|max:160',
        'civic' => 'required|string|max:10',
        'city' => 'required|string|max:40',
        'state' => 'required|string|max:40',
        'cap' => 'required|numeric|digits:5',
        'phone' => 'required|string|max:15',
        'email' => 'required|string|email|max:255'
    ];

    public function checkout()
    {
        return view('checkout');
    }

    // Ritorna una stringa formattata per l'indirizzo
    protected function getAddress($street, $number, $city, $state, $cap)
    {
        return $street . ", " . $number . ", " . $city . ", " . $state . ", " . $cap;
    }

    public function validateShippingInfo(Request $request)
    {
        $request->validate($this->validation);
        $form_data = $request->all();

        return view('checkout', compact('form_data'));
    }

    // Versione per chiamata ajax
    // public function validateShippingInfo(Request $request)
    // {
    //     $request->validate($this->validation);

    //     $response = array(
    //         'status' => 'success',
    //     );

    //     return response()->json($response);
    // }

    public function process(Request $request)
    {
        $payload = $request->input('payload', false);
        $nonce = $payload['nonce'];
        $cart = $payload['cart'];
        $total = $this->getTotal($cart);
        $user_id = $payload['user_id'];

        $form_data = $payload['form_data'];

        $status = Braintree\Transaction::sale([
            'amount' => $total,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($status->success) {
            //Tabella ordini
            $user = User::find($user_id);

            $new_order = new Order;
            $new_order->user()->associate($user);
            $new_order->name = $form_data["fullName"];
            $new_order->email = $form_data["email"];
            $new_order->phone = $form_data["phone"];
            $new_order->address = $this->getAddress($form_data['street'], $form_data['civic'], $form_data['city'], $form_data['state'], $form_data['cap']);
            $new_order->shipment = 0; //todo
            $new_order->total = 0; //todo
            $new_order->payed = 0; //todo
            $new_order->save();

            // Tabella ponte
            $dish = Dish::find(1); //todo

            $quantity = 1; //todo
            $unit_price = 1; //todo

            $new_order->dishes()->attach($dish, ['quantity' => $quantity, "unit_price" => $unit_price]);
        }

        $response = response()->json($status);

        return $response;
    }

    protected function getTotal($cart)
    {
        $total = 0;

        foreach ($cart as $item) {

            $dish = Dish::find($item['id']);
            $total += $dish->price * $item['quantity'];
        }

        return $total;
    }
}
