<?php

namespace App\Http\Controllers;

use Stripe\Stripe;
use Illuminate\Http\Request;

class StripeController extends Controller
{
    // public function stripe($totalprice){

    //     return view('home.pages.stripepay', compact('totalprice'));
    // }

/**
* success response method.
*
* @return \Illuminate\Http\Response
*/
public function stripe()
{
      return view('home.pages.stripepay');
}
/**
* success response method.
*
* @return \Illuminate\Http\Response
*/
public function stripePost(Request $request)
{
Stripe::setApiKey(env('STRIPE_SECRET'));
    Stripe\Charge::create ([
    "amount" => 100 * 100,
    "currency" => "usd",
    "source" => $request->stripeToken,
    "description" => "Test payment from itsolutionstuff.com."
    ]);
    Session::flash('success', 'Payment successful!');
    return back();
}





}
