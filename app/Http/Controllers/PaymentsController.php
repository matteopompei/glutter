<?php

namespace App\Http\Controllers;

use App\Dish;
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

        $status = Braintree\Transaction::sale([
            'amount' => $total,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return response()->json($status);
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
