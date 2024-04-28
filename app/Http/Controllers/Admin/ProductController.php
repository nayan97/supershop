<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = category::latest()->get();
        $brands = Brand::latest()->get();
        $data =product::latest()->get();
        $form = 'create';

        return view('admin.product.index',compact('categories','brands','data','form'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::latest()->get();
        $brands = Brand::latest()->get();
        $data =product::latest()->get();
        $form = 'create';

        return view('admin.product.create',compact('categories','brands','data','form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
