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
}
