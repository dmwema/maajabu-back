<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
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
        $request->validate([
            'date_reservation' => 'required',
            'user_id' => 'required',
            'service_id' => 'required',
            'qte' => 'required'
        ]);

        if ($reservation = Reservation::create([
            'date_reservation' => $request->date_reservation,
            'user_id' => $request->user_id,
            'service_id' => $request->service_id,
            'quatity' => $request->qte
        ])) {
            return redirect()->back()->with('success', 'Réservation enrégistrée avec succès');
        }
        return redirect()->back()->with('fail', 'Veuillez réessayer, une erreur est survenue');
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
    public function destroy(Request $request)
    {
        $reservation = Reservation::find($request->id);
        if ($reservation->delete()) {
            return redirect()->back()->with('success', 'Réservation supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Veuillez réessayer, une erreur est survenue');
    }

    public function edit(Request $request)
    {
        $reservation = Reservation::find($request->id);
        $users = User::all();
        $services = Service::all();
        return view('users.admin.reservation_edit', ['reservation' => $reservation, 'users' => $users, 'services' => $services]);
    }

    public function update_reservation(Request $request)
    {
        $reservation = Reservation::find($request->id);

        $reservation->date_reservation = $request->date_reservation;
        $reservation->user_id = $request->user_id;
        $reservation->service_id = $request->service_id;
        $reservation->quatity = $request->qte;

        if ($reservation->save()) {
            return redirect()->route('reservations')->with('success', 'Reservation modifié avec succès');
        }
        return redirect()->route('reservations')->with('fail', 'Une erreur est survenue lors de la modification');
    }
}
