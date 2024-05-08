<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function index(){
        $latestpros = product::where('stock_status', 'inStock')->latest()->take(3)->get();
        return view('home.layouts.index',compact('latestpros'));
    }
}
