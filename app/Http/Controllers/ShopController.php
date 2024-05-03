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
}
