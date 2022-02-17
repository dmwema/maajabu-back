<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Return list of all users
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ], 403);
        }
        return User::all();
    }

    public function edit_pass(Request $request)
    {
        $user = User::find($request->id);

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
        $user = User::find($request->session()->get('admin')->id);
        //dd($user);
        return view('users.admin.profile', ['user' => $user]);
    }

    public function profile_fin(Request $request)
    {
        $user = User::find($request->session()->get('finance')->id);

        return view('users.finance.profile', ['user' => $user]);
    }

    public function edit_client(Request $request)
    {
        $client = User::find($request->id);

        return view('client_edit', ['client' => $client]);
    }

    public function update_client(Request $request)
    {
        $client = User::find($request->id);

        $client->name = $request->name;
        $client->firstname = $request->firstname;
        $client->email = $request->email;
        $client->phone = $request->phone;
        if ($request->identity) {
            $client->identity = $request->identity;
        }
        $client->address = $request->address;

        if ($client->save()) {
            return redirect()->back()->with('success', 'Utilisateur modifié avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survenue lors de la modification');
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
            'name' => 'required|string|min:2|max:45',
            'firstname' => 'required|string|min:2|max:45',
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable',
            'avatar' => 'nullable|image',
            'password' => 'required|confirmed',
            'address' => 'required'
        ]);

        $pathImage = $request->avatar->store('users', 'public');
        if ($user = User::create([
            'name' => $request->name,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'avatar' => $pathImage,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'address' => $request->address
        ])) {

            return response()->json([
                'success' => true,
                'message' => 'Utilisateur crée',
                'data' => $user
            ]);
        }
    }

    public function store_client(Request $request)
    {
        $user = new User();

        $user->identity = CLIENTS_ID;
        $user->name = $request->name;
        $user->firstname = $request->firstname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->identity = $request->identity ?? CLIENTS_ID;
        $user->address = $request->address;

        if (count(User::where('email', $request->email)->get()) > 0) {
            return redirect()->back()->with('fail', 'L\'addresse email entrée est déjà prise');
        }

        $user->password = Hash::make('password');

        if ($user->save()) {
            return redirect()->back()->with('success', 'Utilisateur enrégistré avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survenue lors de l\'enrégistrement');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //

        $reservations = $user->reservations;
        $profile = $user->image;
        $user->avatar = env('APP_URL').Storage::url($user->avatar);
        return [
            'user' => $user,
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        // if ($request->admin) {
        //     if (!Gate::allows('access-admin')) {
        //         return response([
        //             'message' => 'pas autorisé'
        //         ], 403);
        //     }
        // }
        if (empty($request->avatar)) {
            if ($user->avatar == "") {
                $pathImage = "default.png";
            }else {
                $pathImage = $user->avatar;
            }
        }else{
            $filename = time(). '.' .$request->img_url->extension();
            $pathImage = $request->file('avatar')->storeAs(
                'users',
                $filename,
                'public'
            );
            Storage::disk('public')->delete($user->avatar);
            $request->avatar = $pathImage;
            if ($user->update($request->all())) {
                return response()->json([
                    'success' => true,
                    'message' => 'Utilisateur modifié',
                    'data' => $request->user
                ]);
            }
        }
    }

    public function users(Request $request)
    {
        $users = User::where('id', '!=', $request->session()->get('admin')->id)->get();
        return view('users.admin.users', ['users' => $users]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        if ($user->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Utilisateur supprimé',
                'data' => $user
            ]);
        }
    }

    public function delete(Request $request)
    {
        $user = User::find($request->id);
        if(Storage::disk('public')->exists($user->avatar)){
            Storage::disk('public')->delete($user->avatar);
        }
        if ($user->delete()) {
            return redirect()->back()->with('success', 'Utilisateur supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
    }
}
