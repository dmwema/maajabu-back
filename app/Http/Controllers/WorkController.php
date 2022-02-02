<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Work as ResourcesWork;
use App\Models\Artist;
use App\Models\Engineer;
use App\Models\Service;

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
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'engineer_id' => 'required',
            'artist_id' => 'required',
        ]);

        if (Work::create($request->all())) {
            return redirect()->route('works')->with('success', 'Projet enrégistré avec succès');
        }
    }

    public function new(Request $request)
    {
        $engineers = Engineer::all();
        $artists = Artist::all();
        return view('users.admin.new_work', ['engineers' => $engineers, 'artists' => $artists]);
    }


    public function edit(Request $request)
    {
        $work = Work::find($request->id);
        $irs = Engineer::all();
        $artists = Artist::all();

        return view('users.admin.edit_work', ['work' => $work, 'engineers' => $irs, 'artists' => $artists]);
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
        $work = Work::find($request->id);

        if ($request->name) {
            $work->name = $request->name;
        }

        if ($request->description) {
            $work->description = $request->description;
        }

        if ($request->engineer_id) {
            $work->engineer_id = $request->engineer_id;
        }

        if ($request->artist_id) {
            $work->artist_id = $request->artist_id;
        }

        if ($request->end) {
            $work->end = $request->end;
        }

        if ($work->save()) {
            return redirect()->back()->with('success', 'Modifications éffectuées');
        }
        return redirect()->back()->with('fail', 'Veuillez réessayer, une erreur est survenue');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Work  $work
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $work = Work::find($request->id);
        if ($work->delete()) {
            return redirect()->back()->with('success', 'Projet supprimé avec succès');
        }
    }
}
