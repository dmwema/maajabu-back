<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Artist as ResourcesArtist;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ResourcesArtist::collection(Artist::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ], 403);
        }
        */

        $request->validate([
            'name' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
        ]);

        if (Artist::create($request->all())) {
            return redirect()->back()->with('success', 'Nouveau artiste enregistré avec succès');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function show(Artist $artist)
    {
        //
        $works = $artist->works;
        return [
            'artist' => $artist
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $artist = Artist::find($request->id);
        if ($artist->update($request->all())) {
            return redirect()->route('admin.artist')->with('success', 'Modifications éffectuées');
        } else {
            return redirect()->route('admin.artist')->with('fail', 'Veuillez réessayer, une erreur est survenue');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $artist = Artist::find($request->id);
        if ($artist->delete()) {
            return redirect()->back()->with('success', 'Artiste supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
    }

    public function get_infos()
    {
        $infos = Artist::all();
        return view('users.admin.artist', ['artists' => $infos]);
    }

    public function get_infos_ir(Request $request)
    {
        $infos = Artist::all();
        return view('users.ir.artist', ['artists' => $infos]);
    }

    public function edit(Request $request)
    {
        $artist = Artist::find($request->id);

        return view('users.admin.artist_edit', ['artist' => $artist]);
    }
}
