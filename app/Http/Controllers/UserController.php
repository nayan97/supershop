<?php

namespace App\Http\Controllers;

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
        Shipping::create([
            'user_id' => Auth::id(),
            'fname' => $request -> fname,
            'lname' => $request -> lname,
            'email' => $request -> email,
            'cell' => $request -> cell,
            'address' => $request -> address,
            'opaddress' => $request -> opaddress,
            'city' => $request -> city,
            'state' => $request -> state,
            'zip' => $request -> zip,

            'total_amount' => $request -> total_amount,
        ]);  
        return Redirect()->back()->with('success','Product Added successfully');
 }


}
