<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Work as ResourcesWork;
use App\Models\Artist;
use App\Models\Engineer;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $works = Work::all();
        return ResourcesWork::collection($works);
    }

    public function all(Request $request)
    {
        $works = Work::all();

        return view('users.admin.project', ['works' => $works]);
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

        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'engineer_id' => 'required',
            'artist_id' => 'required',
        ]);
        if (Work::create($request->all())) {
            return [
                "success" => "true",
                "message" => "Enregistrement effectué",
                "data" => $request->work
            ];
        }
    }

    public function new(Request $request)
    {
        $engineers = Engineer::all();
        $artists = Artist::all();
        return view('users.admin.new_work', ['engineers' => $engineers, 'artists' => $artists]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Work  $workModelsArtist
     * @return \Illuminate\Http\Response
     */
    public function show(Work $work)
    {
        //
        $engineer = $work->engineer;
        $artist = $work->artist;
        $categories = $work->categories;

        return [
            'works' => $work
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Work $work)
    {
        //

        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ], 403);
        }
        if ($work->update($request->all())) {
            return [
                "success" => "true",
                "message" => "La modification a reussie",
                "data" => $request->work
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Work $work)
    {
        //
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ], 403);
        }
        if ($work->delete()) {
            return [
                "success" => "true",
                "message" => "Enregistrement supprimé",
                "data" => $work
            ];
        }
    }
}
