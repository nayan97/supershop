<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\product;
use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data =product::latest()->get();
    

        return view('admin.product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::latest()->get();
        $brands = Brand::latest()->get();
        $form = 'create';

        return view('admin.product.create',compact('categories','brands','form'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'name'                 => 'required',
            'short_description'    => 'required',
            'description'          => 'required',
            'regular_price'        => 'required',
            'sale_price'           => 'required',
            'quantity'             => 'required',
            'img'                  => 'required',
            'gallery'              => 'required',
            'category_id'          => 'required',
            'brand_id'             => 'required',
          
        ]); 

        $imag_one = $request->file('img');                
        $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
        Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);       
        $img_url1 = 'fontend/img/product/upload/'.$name_gen;

        $imag_two = $request->file('gallery');                
        $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
        Image::make($imag_two)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);       
        $img_url2 = 'fontend/img/product/upload/'.$name_gen;



        product::create([
            'category_id'    => $request->category_id,
            'brand_id'       => $request->brand_id,
            'name'           => $request->name,
            'slug'           => Str::slug($request -> name),
            'regular_price'  => $request->regular_price,
            'sale_price'     => $request->sale_price,
            'quantity'       => $request->quantity,
            'short_description' => $request->short_description,
            'description'    => $request->description,
            'img'            => $img_url1,
            'gallery'        => $img_url2,
        ]);

        return Redirect()->back()->with('success','Product Added');
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
        {   $product =product::findOrFail($id);
            $cats = Category::latest()-> get();
            $products = product::latest()-> get();
            $brands = Brand::latest()->get();
    
            return view('admin.product.create',[
                    'form'     => 'edit',
                    'product'  => $product,
                    'cats'     => $cats,
                    'products' => $products,
                    'brands'   => $brands
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product =product::findOrFail($id);



        if( $request -> hasFile('img','gallery') ){

            $imag_one = $request->file('img');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);       
            $img_url1 = 'fontend/img/product/upload/'.$name_gen;
    
            $imag_two = $request->file('gallery');                
            $name_gen = hexdec(uniqid()).'.'.$imag_two->getClientOriginalExtension();
            Image::make($imag_two)->resize(270,270)->save('fontend/img/product/upload/'.$name_gen);       
            $img_url2 = 'fontend/img/product/upload/'.$name_gen;
    
        $product->update([
            'category_id'    => $request->category_id,
            'brand_id'       => $request->brand_id,
            'name'           => $request->name,
            'slug'           => Str::slug($request -> name),
            'regular_price'  => $request->regular_price,
            'sale_price'     => $request->sale_price,
            'quantity'       => $request->quantity,
            'short_description' => $request->short_description,
            'description'    => $request->description,
            'img'            => $img_url1,
            'gallery'        => $img_url2,
        ]);
        return Redirect()->back()->with('success','Product Added successfully');
      }else{
        $product->update([
            'category_id'    => $request->category_id,
            'brand_id'       => $request->brand_id,
            'name'           => $request->name,
            'slug'           => Str::slug($request -> name),
            'regular_price'  => $request->regular_price,
            'sale_price'     => $request->sale_price,
            'quantity'       => $request->quantity,
            'short_description' => $request->short_description,
            'description'    => $request->description,
     
        ]);
        return Redirect()->back()->with('success','Product Added');
      }

       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   $product =product::findOrFail($id);

        $product ->delete();
       
        return redirect()->back()-> with('success', 'Product deleted successfuly');
    }
}
