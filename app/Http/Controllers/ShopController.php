<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   public function shop(Request $request){

        $page = $request->query('page');
        $size = $request->query('size');
        if(!$page)
            $page = 1;
        if(!$size)
            $size = 12;
            $order = $request->query("order");
        if(!$order)
            $order = -1;
            $o_column = "";
            $o_order = "";
            switch($order)
            {
            case 1:
                  $o_column = "created_at";
                  $o_order = "DESC";
                  break;
            case 2:
                  $o_column = "created_at";
                  $o_order = "ASC";
                  break;
            case 3:
                  $o_column = "regular_price";
                  $o_order = "ASC";
                  break;  
            case 4:
                  $o_column = "regular_price";
                  $o_order = "DESC";
                  break;
            default:
                  $o_column = "id";
                  $o_order = "DESC";
      
            }   
     
        $products =product::OrderBy('created_at','DESC')->orderBy($o_column,$o_order)->paginate($size);
        return view('home.pages.shop',compact('products','page','size','order'));
        
    }
   
    public function productDetails($slug){
        $product = product::where('slug', $slug)->first();
        $reproducts= product::where('slug', '!=',$slug)->inRandomOrder('id')->get()->take(4);
        return view('home.pages.details', compact('product','reproducts'));
    }



}   
