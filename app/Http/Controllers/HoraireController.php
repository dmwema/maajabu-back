<?php

namespace App\Http\Controllers;

use App\Models\Horaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Horaire as ResourcesHoraire;

class HoraireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $horaires = Horaire::all();
        return ResourcesHoraire::collection($horaires);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        $request->validate([
            'day' => 'required',
            'go_before_midday' => 'required',
            'end_before_midday' => 'required',
            'go_after_midday' => 'required',
            'end_after_midday' => 'required',
        ]);
        if (Horaire::create($request->all())) {
            return [
                "success" => true,
                "message" => "Enregistrement effectué",
                "data" => $request->horaire
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horaire  $horaire
     * @return \Illuminate\Http\Response
     */
    public function show(Horaire $horaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horaire  $horaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horaire $horaire)
    {
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        if ($horaire->update($request->all())) {
            return [
                "success" => true,
                "message" => "La modification a reussie",
                "data" => $request->horaire
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horaire  $horaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horaire $horaire)
    {
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        if ($horaire->delete()) {
            return [
                "success" => true,
                "message" => "Enregistrement supprimé",
                "data" => $horaire
            ];
        }
    }
}
