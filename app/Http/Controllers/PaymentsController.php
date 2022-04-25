<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Order;
use Braintree;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{
    protected $validation = [
        'fullName' => 'required|max:255',
    ];

    public function checkout()
    {
        return view('checkout');
    }

    public function validateShippingInfo(Request $request)
    {
        $request->validate($this->validation);
        $form_data = $request->all();

        // $order_data = [
        //     "user_id" => 0,
        //     "email" => "aaaa@ada.it",
        //     "name" => $request["fullName"],
        //     "address" => "aaaa",
        //     "total" => 10,
        //     "payed" => 10,
        // ];

        // $new_order = new Order;
        // $new_order->user_id = 1;
        // $new_order->email = "aaa@aa.it";
        // $new_order->name = "boh";
        // $new_order->phone = "44ff";
        // $new_order->address = "address";
        // $new_order->shipment = 0;
        // $new_order->total = 0;
        // $new_order->payed = 0;

        // $new_order->fill($order_data);

        // $new_order->save();

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

        $form_data = $payload['form_data'];

        $status = Braintree\Transaction::sale([
            'amount' => $total,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        if ($status->success) {
            $new_order = new Order;
            $new_order->user_id = 1;
            $new_order->email = "aaa@aa.it";
            $new_order->name = $form_data["fullName"];
            $new_order->phone = "test";
            $new_order->address = "address";
            $new_order->shipment = 0;
            $new_order->total = 0;
            $new_order->payed = 0;
            $new_order->save();
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
