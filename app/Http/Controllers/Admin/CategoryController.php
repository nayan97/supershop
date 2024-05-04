<?php

namespace App\Http\Controllers\Admin;

use App\Models\category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats =category::all();
        return view('admin.product.category.index',[
            'cats' => $cats,
            'type' => 'add',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this -> validate($request, [
            'name'      => 'required'
          ]);


          $imag_one = $request->file('img');                
          $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
          Image::make($imag_one)->resize(270,270)->save('fontend/img/category/upload/'.$name_gen);       
          $img_url = 'fontend/img/category/upload/'.$name_gen;


          category::create([
            'name'  => $request -> name,
            'slug'  => Str::slug($request -> name),
            'img'   => $img_url
    
          ]);
          return back() -> with('success', 'Category Created Successfuly');
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
    {   $cats =category::all();
        $categorys =category::findOrFail($id);
        return view('admin.product.category.index',[
            'cats' => $cats,
            'categorys' => $categorys,
            'type'     => 'edit',
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $categorys =category::findOrFail($id);

        if($request ->hasFile('img')) {

            $imag_one = $request->file('img');                
            $name_gen = hexdec(uniqid()).'.'.$imag_one->getClientOriginalExtension();
            Image::make($imag_one)->resize(270,270)->save('fontend/img/category/upload/'.$name_gen);       
            $img_url = 'fontend/img/category/upload/'.$name_gen;

            $categorys->update([
                    'name' => $request->name,
                    'slug'           => Str::slug($request -> name),
                    'img'            => $img_url,
                ]);
                return Redirect()->back()->with('success','Product Added successfully');
        }else{
            $categorys->update([
                'name' => $request->name,
                'slug'           => Str::slug($request -> name),
             

        ]);
            return Redirect()->back()->with('success','Product Added successfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cats=category::findOrFail($id);

        $cats->delete();

        return redirect()->back()->with('success','Category Removed successfully');
    }
}
