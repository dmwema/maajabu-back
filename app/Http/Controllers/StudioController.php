<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Studio as ResourcesStudio;
use App\Models\Image;

class StudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $studios = Studio::all();

        return [
            'studios' => ResourcesStudio::collection($studios)
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
    //     if (!Gate::allows('access-admin')) {
    //         return response([
    //             'message' => 'pas autorisé'
    //         ],403);
    //     }

    //     if ($studio=Studio::create($request->all())) {
    //         $pathImage = $request->img_url->store('galeries', 'public');
    //         $image = new Image(['img_url' => $pathImage]);
    //         $studio->image()->save($image);
    //         return [
    //             'success' => true,
    //             'message' => 'Enregistrement effectué',
    //             'data' => $studio
    //         ];
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function show(Studio $studio)
    {
        //
        $phones = $studio->phones;
        $social_networks = $studio->social_networks;
        $images = $studio->images;
        $services = Service::all();
        return [
            'studio' => $studio,
            'services' => $services,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Studio $studio)
    // {
    //     //
    //     if (!Gate::allows('access-admin')) {
    //         return response([
    //             'message' => 'pas autorisé'
    //         ],403);
    //     }
    //     if ($studio->update($request->all())) {
    //         return [
    //             "success" => true,
    //             "message" => "La modification a reussie",
    //             "data" => $request->studio
    //         ];
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Studio $studio)
    // {
    //     //
    //     if (!Gate::allows('access-admin')) {
    //         return response([
    //             'message' => 'pas autorisé'
    //         ],403);
    //     }
    //     if ($studio->delete()) {
    //         return [
    //             "success" => true,
    //             "message" => "La modification a reussie",
    //             "data" => $studio
    //         ];
    //     }
    // }
}
