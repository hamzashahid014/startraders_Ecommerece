<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function stripePayment(Order $order)
{

//dd(env('STRIPE_SECRET'));
    Stripe::setApiKey(env('STRIPE_SECRET'));

$session = Session::create([
    'payment_method_types' => ['card'],

    'line_items' => [[

        'price_data' => [

            'currency' => 'pkr',

            'product_data' => [
                'name' => 'Order #'.$order->id,
            ],

            'unit_amount' => $order->total_amount * 100,

        ],

        'quantity' => 1,

    ]],

    'mode' => 'payment',

    'success_url' => route('stripe.success', $order),

    'cancel_url' => route('stripe.cancel', $order),

]);

return redirect($session->url);
}

public function success (Order $order)
{
    $order->update([
        'payment_status'=>'paid'

    ]);
    session()->forget('cart');
    return redirect()->route('user.orderSuccess');
}

public function cancel(Order $order)
{
    return redirect()->route('user.checkout')->with('error','Payment cancelled.');
}
}
