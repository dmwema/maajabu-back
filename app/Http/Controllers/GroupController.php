<?php

namespace App\Http\Controllers;

use App\Models\group;
use App\Models\Studio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GroupController extends Controller
{
    public function index()
    {
        $studio = Studio::all()->first();
        $groups = group::all();
        $users = User::where('identity', '!=', '1')->where('identity', '!=', '2')->where('identity', '!=', '3')->get();

        return view('users.admin.group', ['studio' => $studio, 'groups' => $groups, 'users' => $users]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $group = group::find($request->id);
        if ($group->delete()) {
            return redirect()->back()->with('success', 'Groupe supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
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

        if (Group::create($request->all())) {
            return redirect()->back()->with('success', 'Group enrégistré avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
    }
}
