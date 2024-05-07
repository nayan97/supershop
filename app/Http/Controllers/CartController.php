<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        $cartItems = Cart::instance('cart')->content();
        return view('home.pages.cart',[

            'cartItems' => $cartItems

        ]);
    }

    //-------------------Add to cart------------------

    public function addToCart(Request $request){

        $product = product::find($request->id);
        $price = $product->sale_price ? $product->sale_price : $product->regular_price;
        Cart::instance('cart')->add($product->id, $product->name, $request->quantity,$price)->associate('App\Models\product');

        return redirect()->route('shop.page')->with('success', 'Cart added successfully');
    }

    //--------------------update cart------------------------

    public function updateCart(Request $request)
    {
        Cart::instance('cart')->update($request->rowId,$request->quantity);
        return redirect()->route('cart.page.index');
    } 


    public function removeCart(Request $request){

        $rowId = $request->rowId;
        Cart::instance('cart')->remove($rowId);
        return redirect()->route('cart.page.index');
    }

    public function clearCart(){
        Cart::instance('cart')->destroy();
        return redirect()->route('cart.page.index'); 
    }
    




}
