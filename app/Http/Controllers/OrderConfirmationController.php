<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderConfirmationController extends Controller
{

    public function successfulPayment() {
        return view('successfulPayment');
    }
    public function runStripe(Request $request){
        \Stripe\Stripe::setApiKey(config('stripe.sk'));

        $orderDetails = $request->get('finalOrderDetails');
        $cost = $request->get('finalOrderTotal');

        // Convert decimal value to cents (integer)
        $unitAmountCents = (int) round($cost * 100);

        try {
            // $this->addOrder($request);
            $session = \Stripe\Checkout\Session::create([
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $orderDetails,
                            ],
                            'unit_amount' => $unitAmountCents,
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('successfulPayment'),
                // 'cancel_url' => route('mobileorders'),
            ]);

            return redirect()->away($session->url);
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            \Log::error('Stripe Exception: ' . $e->getMessage());
            // Handle the exception, return an error response, or redirect to an error page.
        }
    }}
