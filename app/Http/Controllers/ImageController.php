<?php

namespace App\Http\Controllers;

use App\Http\Resources\Image as ResourcesImage;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $images = Image::all();
        return [
            'images' => ResourcesImage::collection($images)
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $filename = time() . '.' . $request->img_url->extension();
        $pathImage = $request->file('img_url')->storeAs(
            'gallery',
            $filename,
            'public'
        );

        if ($image = Image::create([
            'img_url' => $pathImage
        ])) {
            return redirect()->back()->with('success', 'Image enregistrée avec succès');
        } else {
            Storage::delete($pathImage);
            return redirect()->back()->with('fail', 'Une erreur est survenue lors de l\'enrégistrement');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
        return [
            'image' => env('APP_URL').$image
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $image = Image::find($request->id);

        if ($request->img_url) {
            $filename = time() . '.' . $request->img_url->extension();
            $pathImage = $request->file('img_url')->storeAs(
                'gallery',
                $filename,
                'public'
            );
            Storage::disk('public')->delete($image->img_url);
        } else {
            if ($image->img_url == "") {
                $pathImage = "default.png";
            }else {
                $pathImage = $image->img_url;
            }
        }
        $image->img_url = $pathImage;

        if ($image->save()) {
            return redirect()->back()->with('success', 'Image modifiée avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survenue lors de la modification');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $image = Image::find($request->id);
        if(Storage::disk('public')->exists($image->img_url)){
            Storage::disk('public')->delete($image->img_url);
        }
        if ($image->delete()) {
            return redirect()->back()->with('success', 'Service supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
    }

    public function get_infos(){
        $infos = Image::all();
        return view('users.admin.image', ['images' => $infos]);
    }

    public function edit_image(Request $request){
        $image = Image::find($request->id);
        return view('users.admin.image_edit', ['image' => $image]);
    }
}
