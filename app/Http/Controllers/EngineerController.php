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

    public function edit_pass(Request $request)
    {
        $user = Engineer::find($request->id);

        if (!Hash::check($request->password, $user->password)) {
            return redirect()->back()->with('fail', 'Vous avez saisi un mot de passe actuel incorrect');
        }

        if ($request->newpassword != $request->newpassword_c) {
            return redirect()->back()->with('fail', 'Les deux mot de passes actuels ne correspondent pas');
        }

        $user->password = Hash::make($request->newpassword);

        if ($user->save()) {
            return redirect()->back()->with('success', 'Nouveau mot de passe enrégistré avec succès');
        }
        return redirect()->back()->with('fail', 'Un problème est survenu');
    }

    public function profile(Request $request)
    {
        $ir = Engineer::find($request->session()->get('ir')->id);
        //dd($user);
        return view('users.ir.profile', ['ir' => $ir]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->logiciel);
        //
        $filename = time() . '.' . $request->img_url->extension();
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
            $engineer->logiciels()->sync($request->logiciel);
            return redirect()->back()->with('success', 'Ingénieur enregistré avec succès');
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
        $engineer->img_url = env('APP_URL').Storage::url($engineer->img_url);
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

        if ($request->password != "" && ($request->password == $request->password_confirm)) {
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
                $pathImage = "default.png";
            } else {
                $pathImage = $engineer->img_url;
            }
        } else {
            $filename = time() . '.' . $request->img_url->extension();
            $pathImage = $request->file('img_url')->storeAs(
                'engineers',
                $filename,
                'public'
            );
            Storage::disk('public')->delete($engineer->img_url);
        }
        $engineer->img_url = $pathImage;
        $engineer->logiciels()->sync($request->logiciel);

        if ($engineer->save()) {
            return redirect()->back()->with('success', 'Ingénieur modifié avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survenue lors de la modification');
    }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Engineer  $engineer
    //  * @return \Illuminate\Http\Response
    //  */
    public function delete(Request $request)
    {
        $engineer = Engineer::find($request->id);
        if(Storage::disk('public')->exists($engineer->img_url)){
            Storage::disk('public')->delete($engineer->img_url);
        }
        if ($engineer->delete()) {
            return redirect()->back()->with('success', 'Ingénieur supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
    }

    public function edit_engineer(Request $request)
    {
        $engineer = Engineer::find($request->id);
        $logiciels = Logiciel::all();

        return view('engineer_edit', ['engineer' => $engineer, 'logiciels' => $logiciels]);
    }

    public function get_infos()
    {
        $infos = Engineer::all();
        $logiciels = Logiciel::all();
        return view('users.admin.engineer', ['engineers' => $infos, 'logiciels' => $logiciels]);
    }
}
