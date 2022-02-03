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

        return view('users.admin.logiciels', ['logiciels' => $logiciels]);
    }

    public function edit(Request $request)
    {
        $logiciel = Logiciel::find($request->id);
        return view('users.admin.edit_logiciel', ['logiciel' => $logiciel]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);

        if (Logiciel::create($request->all())) {
            return redirect()->back()->with('success', 'Logiciel enrégistré avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
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
            ], 403);
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
    public function destroy(Request $request)
    {
        $logiciel = Logiciel::find($request->id);
        if ($logiciel->delete()) {
            return redirect()->back()->with('success', 'Logiciel supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
    }
}
