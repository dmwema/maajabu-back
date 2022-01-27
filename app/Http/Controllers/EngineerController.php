<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Engineer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Engineer as ResourcesEngineer;

class EngineerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $engineers = Engineer::all();
        return ResourcesEngineer::collection($engineers);
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
    //     $request->validate([
    //         'name' => 'required',
    //         'year_experience' => 'required',
    //     ]);
    //     if ($engineer = Engineer::create($request->all())) {
    //         $pathImage = $request->img_url->store('engineers', 'public');
    //         $image = new Image(['img_url' => $pathImage]);
    //         $engineer->image()->save($image);
    //         return [
    //             "success" => true,
    //             "message" => "Enregistrement effectué",
    //             "data" => $engineer
    //         ];
    //     }
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Engineer  $engineer
     * @return \Illuminate\Http\Response
     */
    public function show(Engineer $engineer)
    {
        //
        $works = $engineer->works;
        $logiciels = $engineer->logiciels;
        return [
            'engineer'=>$engineer
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Engineer  $engineer
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Engineer $engineer)
    // {
    //     //
    //     if (!Gate::allows('access-admin')) {
    //         return response([
    //             'message' => 'pas autorisé'
    //         ],403);
    //     }
    //     if ($engineer->update($request->all())) {
    //         return [
    //             "success" => true,
    //             "message" => "La modification a reussie",
    //             "data" => $request->engineer
    //         ];
    //     }
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Engineer  $engineer
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Engineer $engineer)
    // {
    //     //
    //     if (!Gate::allows('access-admin')) {
    //         return response([
    //             'message' => 'pas autorisé'
    //         ],403);
    //     }
    //     if ($engineer->delete()) {
    //         return [
    //             "success" => true,
    //             "message" => "Enregistrement supprimé",
    //             "data" => $engineer
    //         ];
    //     }
    // }
}
