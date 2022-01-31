<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Reservation as ResourcesReservation;
use App\Models\Service;
use App\Models\User;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::all();

        return view('users.admin.reservations', ['reservations' => $reservations]);
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
        $request->validate([
            'date_reservation' => 'required',
            'user_id' => 'required',
        ]);
        if (Reservation::create($request->all())) {
            return [
                "success" => true,
                "message" => "Enregistrement effectué"
            ];
        }
    }

    public function new(Request $request)
    {
        $users = User::where('identity', '!=', '1')->where('identity', '!=', '2')->where('identity', '!=', '3')->get();
        $services = Service::all();
        return view('users.admin.new_reservation', ['users' => $users, 'services' => $services]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show(Reservation $reservation)
    {
        $user = $reservation->user;
        $services = $reservation->services;
        return [
            'reservation' => $reservation
        ];
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
        if ($reservation->update($request->all())) {
            return [
                "success" => true,
                "message" => "La modification a reussie"
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
        if ($reservation->delete()) {
            return [
                "success" => true,
                "message" => "Enregistrement supprimé"
            ];
        }
    }
}
