<?php

namespace App\Http\Controllers;

use App\Models\Logiciel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LogicielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logiciels = Logiciel::all();
        return [
            'logiciels' => $logiciels
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
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        $request->validate([
            'name' => 'required|string'
        ]);
        if (Logiciel::create($request->all())) {
            return [
                "success" => true,
                "message" => "Enregistrement effectué",
                "data" => $request->logiciel
            ];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logiciel  $logiciel
     * @return \Illuminate\Http\Response
     */
    public function show(Logiciel $logiciel)
    {
        $engineers = $logiciel->engineers;
        return [
            'logiciels' => $logiciel
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logiciel  $logiciel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logiciel $logiciel)
    {
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        if ($logiciel->update($request->all())) {
            return [
                "success" => true,
                "message" => "La modification a reussie",
                "data" => $request->logiciel
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logiciel  $logiciel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logiciel $logiciel)
    {
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        if ($logiciel->delete()) {
            return [
                "success" => true,
                "message" => "Enregistrement supprimé",
                "data" => $logiciel
            ];
        }
    }
}
