<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Service as ResourcesService;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return ResourcesService::collection($services);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {

    //     if (!Gate::allows('access-admin')) {
    //         return response([
    //             'message' => 'pas autorisé'
    //         ],403);
    //     }
    //     $request->validate([
    //         'name' => 'required|string',
    //         'description' => 'required',
    //         'tarif_id' => 'required',
    //     ]);
    //     $pathImage = $request->img_url->store('services','public');
    //     if ($service = Service::create([
    //         'name' => $request->name,
    //         'description' => $request->description,
    //         'tarif_id' => $request->tarif_id
    //     ])) {
    //         $pathImage = $request->img_url->store('services', 'public');
    //         $image = new Image(['img_url' => $pathImage]);
    //         $service->image()->save($image);
    //         return [
    //             "success" => true,
    //             "message" => "Enregistrement effectué",
    //             "data" => $service
    //         ];
    //     }

    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
        $tarif = $service->tarifs;
        $reservations = $service->reservations;
        return [
            'service' => $service
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Service $service)
    // {
    //     //
    //     if (!Gate::allows('access-admin')) {
    //         return response([
    //             'message' => 'pas autorisé'
    //         ],403);
    //     }
    //     if ($service->update($request->all())) {
    //         return [
    //             "success" => true,
    //             "message" => "La modification a reussie",
    //             "data" => $request->service
    //         ];
    //     }
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Service $service)
    // {
    //     //
    //     if (!Gate::allows('access-admin')) {
    //         return response([
    //             'message' => 'pas autorisé'
    //         ],403);
    //     }
    //     if ($service->delete()) {
    //         return [
    //             "success" => true,
    //             "message" => "Enregistrement supprimé",
    //             "data" => $service
    //         ];
    //     }
    // }
}
