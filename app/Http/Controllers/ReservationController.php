<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Http\Resources\Reservation as ResourcesReservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (!Gate::allows('access-admin')) {
            return response([
                'message' => 'pas autorisé'
            ],403);
        }
        $reservations = Reservation::all();
        return ResourcesReservation::collection($reservations);
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
            'reservation'=>$reservation
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
