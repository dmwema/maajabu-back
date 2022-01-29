<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

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

    public function edit_client(Request $request)
    {
        $client = User::find($request->id);

        return view('client_edit', ['client' => $client]);
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
            'email' => 'required|email|unique:users,email',
            'phone' => 'nullable',
            'avatar' => 'nullable|image',
            'password' => 'required|confirmed'
        ]);

        $pathImage = $request->avatar->store('users', 'public');
        if ($user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'avatar' => $pathImage,
            'phone' => $request->phone,
            'password' => Hash::make($request->password)
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
        $user->address = $request->address;

        $user->password = Hash::make('password');

        if ($user->save()) {
            return redirect()->back()->with('success', 'Client enrégistré avec succès');
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
        if ($request->admin) {
            if (!Gate::allows('access-admin')) {
                return response([
                    'message' => 'pas autorisé'
                ], 403);
            }
        }
        if ($user->update($request->all())) {
            return response()->json([
                'success' => true,
                'message' => 'Utilisateur modifié',
                'data' => $request->user
            ]);
        }
    }

    public function clients()
    {
        $users = User::where('identity', CLIENTS_ID)->get();
        return view('users.admin.clients', ['clients' => $users]);
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
        if ($user->delete()) {
            return redirect()->back()->with('success', 'Client supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
    }
}
