<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;       

class WishListController extends Controller
{
    public function addToWishList(Request $request){

        Cart::instance('wishlist')->add($request->id, $request->name,1,$request->price)->associate('App\Models\product',);
        return response()->json(['status'=>200, 'success'=>'Success']);

    }
    
}
