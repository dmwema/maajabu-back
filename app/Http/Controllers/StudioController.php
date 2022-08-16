<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Studio as ResourcesStudio;
use App\Models\Image;
use App\Models\Phone;
use App\Models\Social_network;
use Illuminate\Support\Facades\Storage;

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

    public function add_phone(Request $request)
    {
        $phone = new Phone();
        $phone->number = $request->number;
        $phone->studio_id = Studio::all()->first()->id;

        if (Count(Phone::where('number', $phone->number)->get()) > 0) {
            return redirect()->back()->with('fail', 'ce numéro de contact existe déjà');
        }

        if ($phone->save()) {
            return redirect()->back()->with('success', 'Numéro de contact enrégistré avec succès');
        }
    }

    public function add_social(Request $request)
    {
        $social = new Social_network();
        $social->name = $request->name;
        $social->link = $request->link;
        $social->studio_id = Studio::all()->first()->id;

        if (Count(Social_network::where('name', $social->name)->get()) > 0) {
            return redirect()->back()->with('fail', 'ce réseau social à déjà un lien, veuillez le supprimer puis réessayez');
        }

        if ($social->save()) {
            return redirect()->back()->with('success', 'Lien social enrégistré avec succès');
        }
        return redirect()->back()->with('fail', 'une erreur est survénue');
    }

    public function delete_phone(Request $request)
    {
        $phone = Phone::find($request->id);

        if ($phone->delete()) {
            return redirect()->back()->with('success', 'Numéro de contact supprimé avec succès');
        }
    }


    public function delete_social(Request $request)
    {
        $social = Social_network::find($request->id);

        if ($social->delete()) {
            return redirect()->back()->with('success', 'Lien supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survenue');
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
            ], 403);
        }

        if ($studio = Studio::create($request->all())) {
            return [
                'success' => true,
                'message' => 'Enregistrement effectué',
                'data' => $studio
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function show(Studio $studio)
    {

        $phones = $studio->phones;
        $social_networks = $studio->social_networks;
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
    public function update(Request $request, Studio $studio)
    {
        $studio = Studio::all()->first();

        if ($request->name) {
            $studio->name = $request->name;
        }

        if ($request->description) {
            $studio->description = $request->description;
        }

        if ($request->history) {
            $studio->history = $request->history;
        }

        if ($request->adresse) {
            $studio->adresse = $request->adresse;
        }

        if ($request->logo) {
            if ($studio->logo != null) {
                Storage::disk('public')->delete($studio->logo);
            }
            $filename = time() . '.' . $request->logo->extension();
            $pathImage = $request->file('logo')->storeAs(
                'studios',
                $filename,
                'public'
            );
            $studio->logo = $pathImage;
        }

        if ($request->url_maps) {
            $studio->url_maps = $request->url_maps;
        }

        if ($studio->save()) {
            return redirect()->back()->with('success', 'Informations mises à jour avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Studio  $studio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Studio $studio)
    {
        //
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ], 403);
        }
        if ($studio->delete()) {
            return [
                "success" => true,
                "message" => "La modification a reussie",
                "data" => $studio
            ];
        }
    }

    public function get_infos()
    {
        $studio = Studio::all()->first();
        $services = Service::all();

        return view('users.admin.studio', ['studio' => $studio, 'services' => $services]);
    }
}
