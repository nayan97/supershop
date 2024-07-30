<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
      if(Session::has('order_id')){
        $order =Shipping::find(Session::get('order_id'));
        return view('home.pages.stripepay', compact('order'));
      }
      return view('home.pages.shipping');
}
/**
* success response method.
*
* @return \Illuminate\Http\Response
*/
public function stripePost(Request $request)
{
    Stripe::setApiKey(env('STRIPE_SECRET'));

    Charge::create ([
            "amount" => $request->total_amount *100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test payment successful",
    ]);
    
    Session::flash('success', 'Payment successful!');

    // $order = new Shipping;

    // $order -> user_id = Auth::id();
    // $order->status = "paid";
    // $order -> fname = $request -> fname;
    // $order -> lname = $request -> lname;
    // $order -> email = $request -> email;
    // $order -> cell = $request -> cell;
    // $order -> address = $request -> address;
    // $order -> opaddress = $request -> opaddress;
    // $order -> city = $request -> city;
    // $order -> state = $request -> state;
    // $order -> zip = $request -> zip;
    // $order -> total_amount = $request -> total_amount;
    // $order -> pay_method = $request -> paymethod;

    // if($order -> save()) {
    //     // $carts = Cart::instance('cart')->content();
    //     // foreach($carts as $item){ 

    //  foreach(Cart::instance('cart')->content() as $item){ 
            
    //         $orderItem = new OrderItem();

    //         $orderItem -> product_id = $item ->id;
    //         $orderItem -> quantity = $item ->qty;
    //         $orderItem -> price =  $item -> price;
    //         $orderItem -> order_id =  $order->id;
    //         $orderItem -> save();


    //     }
     
        
    // }
    return back();
}





}
