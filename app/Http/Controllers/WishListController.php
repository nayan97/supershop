<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;       

class WishListController extends Controller
{
    public function showWishlist(){
        $items = Cart::instance("wishlist")->content();
        return view('home.pages.wishlist',['items'=>$items]);
    }

    public function addToWishList(Request $request){

        Cart::instance('wishlist')->add($request->id, $request->name,1,$request->price)->associate('App\Models\product',);
        return response()->json(['status'=>200, 'success'=>'Success']);

    }
    

    public function removeFormWishlist(Request $request){

        $rowId = $request->rowId;
        Cart::instance("wishlist")->remove($rowId);
        return redirect()->route('wishlist.show');
    }

    
    public function clearWishlist(){
        Cart::instance("wishlist")->destroy();
        return redirect()->route('wishlist.show'); 
    }

    public function moveToCart(Request $request){
        $item = Cart::instance('wishlist')->get($request->rowId);
        Cart::instance('wishlist')->remove($request->rowId);
        Cart::instance('cart')->add($item->model->id, $item->model->name,1,$item->model->sale_price)->associate('App\Models\product');
        return redirect()->route('wishlist.show');
        
    
    
    }
}