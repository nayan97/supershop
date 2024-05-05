<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   public function shop(){

        $products =product::OrderBy('created_at', 'DESC')->paginate(3);
        return view('home.pages.shop',compact('products'));
        
    }
   
    public function productDetails($slug){
        $product = product::where('slug', $slug)->first();
        $reproducts= product::where('slug', '!=',$slug)->inRandomOrder('id')->get()->take(4);
        return view('home.pages.details', compact('product','reproducts'));
    }



}   
