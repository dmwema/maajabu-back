<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Engineer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Engineer as ResourcesEngineer;
use App\Models\Logiciel;
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
        //
        $filename = time(). '.' .$request->img_url->extension();
        $pathImage = $request->file('img_url')->storeAs(
            'engineers',
            $filename,
            'public'
        );
        if ($engineer = Engineer::create([
            'name' => $request->name,
            'year_experience' => $request->year_experience,
            'img_url' => $pathImage,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone
        ])) {
            $logiciel = new Logiciel();
            $logiciel->name = $request->logiciel;

            $engineer->logiciels()->save($logiciel);
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
    public function update(Request $request)
    {
        $new_logiciels = [];
        $mdfPwd = false;
        $engineer = Engineer::find($request->id);

        if($request->password != "" && ($request->password == $request->password_confirm)){
            $password = $request->password;
            $mdfPwd = true;
        }

        $engineer->name = $request->name;
        $engineer->year_experience = $request->year_experience;
        $engineer->email = $request->email;
        $engineer->phone = $request->phone;

        if ($mdfPwd) {
            $engineer->password = Hash::make($password);
        }
        if (empty($request->img_url)) {
            if ($engineer->img_url == "") {
                $pathImage = "/engineers/default.png";
            }else {
                $pathImage = $engineer->img_url;
            }
        }else{
            $filename = time(). '.' .$request->img_url->extension();
            $pathImage = $request->file('img_url')->storeAs(
                'engineers',
                $filename,
                'public'
            );
            Storage::delete($pathImage);
        }
        $engineer->img_url = $pathImage;

        // if () {
        //     $logiciel = new Logiciel();
        //     $logiciel->name = $request->logiciel;
        //     $engineer->logiciels()->save($logiciel);
        // }

        if ($engineer->save()) {
            return redirect()->route('admin.engineer')->with('success', 'Ingénieur modifié avec succès');
        }
        return redirect()->route('admin.engineer')->with('fail', 'Une erreur est survenue lors de la modification');
    }

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

    public function edit_engineer(Request $request)
    {
        $engineer = Engineer::find($request->id);
        $logiciels = Logiciel::all();

        return view('engineer_edit', ['engineer' => $engineer, 'logiciels' => $logiciels ]);
    }

    public function get_infos()
    {
        $infos = Engineer::all();
        return view('users.admin.engineer', ['engineers' => $infos]);
    }
}
