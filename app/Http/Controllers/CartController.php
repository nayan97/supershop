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

    public function addToCart(Request $request){

        $product = product::find($request->id);
        $price = $product->sale_price ? $product->sale_price : $product->regular_price;
        Cart::instance('cart')->add($product->id, $product->name, $request->quantity,$price)->associate('App\Models\product');

        return redirect()->back()->with('success', 'Cart added successfully');
    }
}
