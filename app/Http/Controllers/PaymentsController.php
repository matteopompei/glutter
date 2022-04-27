<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Order;
use Braintree;
use Carbon\Carbon;
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
        'email' => 'required|string|email|max:255',
        'delivery_date' => 'required|date|after:'
    ];

    public function checkout()
    {
        $minTime = Carbon::now()->addMinutes(40)->format('H:m');
        // $seconds = time();
        // $rounded_seconds = round($seconds / (15 * 60)) * (15 * 60);
        // dd($rounded_seconds);
        return view('checkout', compact('minTime'));
    }

    // Ritorna una stringa formattata per l'indirizzo
    protected function getAddress($street, $number, $city, $state, $cap)
    {
        return $street . ", " . $number . ", " . $city . ", " . $state . ", " . $cap;
    }

    public function validateShippingInfo(Request $request)
    {
        $time = $request['delivery_date'];
        $today = Carbon::now()->format('Y-m-d');
        $request['delivery_date'] = $today . " " . $time;

        $minTime = Carbon::now()->addMinutes(40);
        $this->validation['delivery_date'] = 'required|date|' . $minTime;

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

            $total = 0;
            foreach ($cart as $dish) {
                $db_dish = Dish::find($dish['id']);

                $quantity = $dish['quantity'];
                $unit_price = $db_dish['price'];

                $total += $unit_price * $quantity;
            }

            $new_order = new Order;
            $new_order->user()->associate($user);
            $new_order->name = $form_data["fullName"];
            $new_order->email = $form_data["email"];
            $new_order->phone = $form_data["phone"];
            $new_order->address = $this->getAddress($form_data['street'], $form_data['civic'], $form_data['city'], $form_data['state'], $form_data['cap']);
            $new_order->shipment = 0; //todo
            $new_order->total = $total;
            $new_order->payed = $total;
            $new_order->delivery_date = $form_data["delivery_date"];
            $new_order->save();

            // Tabella ponte
            foreach ($cart as $dish) {
                $db_dish = Dish::find($dish['id']);

                $quantity = $dish['quantity'];
                $unit_price = $db_dish['price'];

                $new_order->dishes()->attach($db_dish, ['quantity' => $quantity, "unit_price" => $unit_price]);
            }
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
