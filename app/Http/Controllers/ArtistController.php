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
        //
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        $request->validate([
            'name' => 'required|string',
        ]);
        if (Artist::create($request->all())) {
            dd($request);
            return [
                "success" => true,
                "message" => "Enregistrement effectué",
                "data" => $request->artist
            ];
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
    public function update(Request $request, Artist $artist)
    {
        //
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        $request->validate([
            'name' => 'required|string'
        ]);
        if ($artist->update($request->all())) {
            return [
                "success" => true,
                "message" => "La modification a reussie",
                "data" => $request->artist
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artist  $artist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        //
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        if ($artist->delete()) {
            return [
                "success" => true,
                "message" => "Enregistrement supprimé",
                "data" => $artist
            ];
        }
    }
}
