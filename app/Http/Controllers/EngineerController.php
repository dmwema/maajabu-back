<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Engineer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Engineer as ResourcesEngineer;
use Illuminate\Support\Facades\Storage;

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
    public function store(Request $request)
    {

        if (!$request->hasFile('img_url')) {
            return redirect()->back()->with('fail', 'Veillez entrer une image de profile');
        }


        $request->validate([
            'image' => 'mimes:jpeg,bmp,png,jpg' // Only allow .jpg, .bmp and .png file types.
        ]);

        $pathImage = $request->img_url->store('irs', 'public');

        if ($engineer = Engineer::create([
            'name' => $request->name,
            'year_experience' => $request->year_experience,
            'img_url' => $pathImage,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone
        ])) {
            return redirect()->back()->with('success', 'Client enrégistré avec succès');
        } else {
            Storage::delete($pathImage);
            return redirect()->back()->with('fail', 'Une erreur est survenue lors de l\'enrégistrement');
        }
    }

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
            'engineer' => $engineer
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

    public function get_infos()
    {
        $infos = Engineer::all();
        return view('users.admin.engineer', ['engineers' => $infos]);
    }
}
