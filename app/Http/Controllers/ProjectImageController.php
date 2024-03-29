<?php

namespace App\Http\Controllers;

use App\Http\Resources\Image;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectImageController extends Controller
{
    public function index()
    {
        $pimages = ProjectImage::all();

        return view('users.admin.pimg', ['pimages' => $pimages]);
    }

    public function edit(Request $request)
    {
        $pimg = ProjectImage::find($request->id);

        return view('pimg_edit', ['pimg' => $pimg]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pathImage = "";
        $image = $request->file('image');
        $pathImage = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('img/projects/');
        $image->move($path, $pathImage);

        if ($project_img = ProjectImage::create([
            'title' => $request->title,
            'category' => $request->category,
            'image' => "/img/projects/" . $pathImage,
        ])) {
            return redirect()->back()->with('success', 'Projet à la une enregistré avec succès');
        } else {
            Storage::delete($pathImage);
            return redirect()->back()->with('fail', 'Une erreur est survenue lors de l\'enrégistrement');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pimg = ProjectImage::find($request->id);

        $pimg->title = $request->title;
        $pimg->category = $request->category;

        if (!empty($request->image)) {
            $image = $request->file('image');
            $pathImage = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('img/projects/');
            $image->move($path, $pathImage);

            Storage::disk('public')->delete($pimg->image);
            $pimg->image = "/img/projects/" . $pathImage;
        }

        if ($pimg->save()) {
            return redirect()->back()->with('success', 'Modifications éffectuées avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survenue lors de la modification');
    }

    public function delete(Request $request)
    {
        $pimg = ProjectImage::find($request->id);
        if (Storage::disk('public')->exists($pimg->image)) {
            Storage::disk('public')->delete($pimg->image);
        }
        if ($pimg->delete()) {
            return redirect()->back()->with('success', 'Enrégistrement supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
    }
}
