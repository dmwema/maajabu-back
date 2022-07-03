<?php

namespace App\Http\Controllers;

use App\Models\Pack;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackController extends Controller
{
    public function index(Request $request)
    {
        $service = Service::find($request->service_id);
        $packs = Pack::where('service_id', $request->service_id)->get();

        return view('users.admin.packs', ['service' => $service, 'packs' => $packs]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $filename = null;
        $pathImage = null;
        if ($request->image !== null) {
            $filename = time() . '.' . $request->image->extension();
            $pathImage = $request->file('image')->storeAs(
                'services',
                $filename,
                'public'
            );
        }

        if ($pack = Pack::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $filename,
            'service_id' => $request->service_id,
        ])) {
            return redirect()->back()->with('success', 'Pack enregistré avec succès');
        } else {
            Storage::delete($pathImage);
            return redirect()->back()->with('fail', 'Une erreur est survenue lors de l\'enrégistrement');
        }
    }

    public function edit(Request $request)
    {
        $pack = Pack::find($request->id);

        return view('users.admin.pack_edit', ['pack' => $pack]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pack = Pack::find($request->id);

        $pack->update([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Pack modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $pack = Pack::find($request->id);
        if (Storage::disk('public')->exists($pack->image)) {
            Storage::disk('public')->delete($pack->image);
        }
        if ($pack->delete()) {
            return redirect()->back()->with('success', 'Pack supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
    }
}
