<?php

namespace App\Http\Controllers;

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
            'images' => $images
        ];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    //     $pathImage = $request->img_url->store('galeries', 'public');
    //     if (Image::create([
    //         'img_url' => $pathImage
    //     ])) {
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Image ajoutée',
    //             'data' => [
    //                 'img_url' => $request->img_url,
    //             ]
    //         ]);
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
        dd($image);
        $struct = $image->imageable;;
        return [
            'image' => $image
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update_image(Request $request)
    {
        //
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ], 403);
        }
        $request->validate([
            'img_url' => 'required|image',
        ]);
        $image = Image::find($request->id);
        $file = explode('/',$image->img_url)[0];
        if (isset($request->img_url)) {
            if (Storage::exists('public/' . $image->img_url)) {
                Storage::delete('public/' . $image->img_url);
            }
            $path = $request->img_url->store($file, 'public');
            $image->img_url = $path;
        }
        $image->update();
        return [
            "success" => true,
            "message" => "La modification a reussie",
            "data" => $image
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ], 403);
        }
        if ($image->delete()) {
            return [
                "success" => true,
                "message" => "Enregistrement supprimé",
                "data" => $image
            ];
        }
    }
}
