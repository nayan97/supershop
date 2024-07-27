<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        return view('users.index');

    }



    public function getShippingAddress(){
         return view('home.pages.shipping');
    }


    /**
     * add shipping address
     */


     public function addShippingAddress(Request $request){

      

            $order = new Shipping;

            $order -> user_id = Auth::id();
            $order -> fname = $request -> fname;
            $order -> lname = $request -> lname;
            $order -> email = $request -> email;
            $order -> cell = $request -> cell;
            $order -> address = $request -> address;
            $order -> opaddress = $request -> opaddress;
            $order -> city = $request -> city;
            $order -> state = $request -> state;
            $order -> zip = $request -> zip;
            $order -> total_amount = $request -> total_amount;

            // $order -> save();

            if($order -> save()) {
                $cat = Cart::instance('cart')-> destroy();
                
            }

        
        return Redirect()->back()->with('success','Product Added successfully');

     }










//     public function addShippingAddress(Request $request){
//        $shop = Shipping::create([
//             'user_id' => Auth::id(),
//             'fname' => $request -> fname,
//             'lname' => $request -> lname,
//             'email' => $request -> email,
//             'cell' => $request -> cell,
//             'address' => $request -> address,
//             'opaddress' => $request -> opaddress,
//             'city' => $request -> city,
//             'state' => $request -> state,
//             'zip' => $request -> zip,

//             'total_amount' => $request -> total_amount,
//         ]);
        
//         if($shop -> create()){
//             Cart::where('user_id', Auth::id())->delete();
//         }

        
//         return Redirect()->back()->with('success','Product Added successfully');
//  }



 /**
  * remove a product from cart when checkout
  */


//   public function clearCart(){
//     Cart::instance('cart')->destroy();
//     return redirect()->route('cart.page.index'); 
// }



}
