<?php

namespace App\Http\Controllers\Admin;

use App\Models\Theme;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $theme = Theme::findOrFail(1);
        return view('admin.theme.index', [
            'theme' => $theme,
         
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
        $theme = Theme::findOrFail(1);

        // Logo manegement
        if($request -> hasFile('logo')){

            $img =$request -> file('logo');
            $file_name = md5(time().rand()).'.'. $img -> clientExtension();

            $image = Image::make($img -> getRealPath());
            $image -> save (storage_path('app/public/logo/'. $file_name));

        }

        $social = [
            'fb'    => $request -> fb ?? '',
            'din'   => $request -> din ?? '',
            'tw'    => $request -> tw ?? '',
            'wapp'  => $request -> wapp ?? '',
            'ins'   => $request -> ins ?? '',
        ];

        $theme -> update([ 
            'title'     => $request -> title,
            'tagline'   => $request -> tagline,
            'cell'      => $request -> cell,
            'email'     => $request -> email,
            'address'   => $request -> address,
            'running_tag'   => $request -> running_tag,
            'copyright' => $request -> copy,
            'logo'      => $file_name ?? 'logo.png',
            'social'   => json_encode($social)

        ]);
        return back() -> with('success', 'Theme data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
