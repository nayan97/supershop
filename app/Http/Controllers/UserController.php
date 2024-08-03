<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\User;
use App\Models\product;
use App\Models\Shipping;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function index(){
          
            $user_id = Auth::id();
            // $users = User::find($user_id);

            $users = User::findOrFail($user_id);
           
            return view('users.index', compact('users'));

    }


    public function userUpdate(Request $request, string $id){
    
      $newUsers = User::findOrFail($id);

      $this -> validate($request,[
        'name'                 => 'required',
        'cell'                 => 'required',
    ]); 
     
        $newUsers -> update([ 
          'name'    => $request -> name,
          'cell'    => $request -> cell,
      ]);
     
      return Redirect()->back()->with('success','Product Added successfully');

    }



    /**
     * password update
     */


    public function password(){
      $user_id = Auth::id();
      $users = User::findOrFail($user_id);
     
      return view('users.password', compact('users'));
    }



    public function passwordUpdate(Request $request, string $id){
    
      $newUsers = User::findOrFail($id);

      $this -> validate($request,[
        'old_password'             => 'required',
        'password'                 => 'required|confirmed',
        'password_confirmation'    => 'required'
    ]); 

      if(password_verify($request -> old_password, $newUsers-> password) ==false){
           return back()->with('success','password is incorrect');

      }else{
          $newUsers -> update([ 
              'password'    =>Hash::make($request -> password)
            
          ]);
        
          return back()->with('success','password updated successfully');

      }
      


    }


    public function getShippingAddress(){
         return view('home.pages.shipping');
    }


    /**
     * add shipping address
     */


     public function addShippingAddress(Request $request){
        $this -> validate($request, [
            'fname'      => 'required'
          ]);
      

            $order = new Shipping;

            $order -> user_id = Auth::id();
            $order->status = "Pending";
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
            $order -> pay_method = $request -> paymethod;

            if($order -> save()) {
                // $carts = Cart::instance('cart')->content();
                // foreach($carts as $item){ 

             foreach(Cart::instance('cart')->content() as $item){ 
                    
                    $orderItem = new OrderItem();

                    $orderItem -> product_id = $item ->id;
                    $orderItem -> quantity = $item ->qty;
                    $orderItem -> price =  $item -> price;
                    $orderItem -> order_id =  $order->id;
                    $orderItem -> save();


                }
                Cart::instance('cart')-> destroy();
                
            }
            if($order->pay_method == 'stripe'){

               Session::put('order_id', $order->id);
               return Redirect()-> route('stripe');

                
            }else{
             return Redirect()->back()->with('success','Product Added successfully');

            }

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
