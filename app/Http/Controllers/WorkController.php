<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use App\Models\Artist;
use App\Models\Service;
use App\Models\Engineer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Http\Resources\Work as ResourcesWork;

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

    public function all_ir(Request $request)
    {
        $works = Work::where('engineer_id', $request->session()->get('ir')->id)->get();

        return view('users.ir.project', ['works' => $works]);
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
            'img_url' => 'nullable',
            'end' => 'required'
        ]);

        //
        $filename = time() . '.' . $request->img_url->extension();
        $pathImage = $request->file('img_url')->storeAs(
            'works',
            $filename,
            'public'
        );
        if ($works = Work::create([
            'name' => $request->name,
            'description' => $request->description,
            'engineer_id' => $request->engineer_id,
            'artist_id' => $request->artist_id,
            'img_url' => $pathImage,
            'end' => $request->end
        ])) {
            return redirect()->route('works')->with('success', 'Projet enrégistré avec succès');
        } else {
            Storage::delete($pathImage);
            return redirect()->back()->with('fail', 'Une erreur est survenue lors de l\'enrégistrement');
        }
        //
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

        if ($request->img_url) {
            $filename = time(). '.' .$request->img_url->extension();
            $pathImage = $request->file('img_url')->storeAs(
                'works',
                $filename,
                'public'
            );
            if ($work->img_url) {
                Storage::disk('public')->delete($work->img_url);
            }
            $work->img_url = $pathImage;
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
        if(Storage::disk('public')->exists($work->img_url)){
            Storage::disk('public')->delete($work->img_url);
        }
        if ($work->delete()) {
            return redirect()->back()->with('success', 'Projet supprimé avec succès');
        }
    }
}
