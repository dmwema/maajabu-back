<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Engineer;
use App\Models\Image;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Studio;
use App\Models\Tarif;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(Request $request)
    {
        $services = Service::all();
        $studio = Studio::all()->first();
        $works = Work::all();
        $artists = Artist::all();
        $engineers = Engineer::all();

        return view('public.home', ['studio' => $studio, 'works' => $works, 'services' => $services, 'artists' => $artists, 'engineers' => $engineers]); //with datas
    }

    public function about(Request $request)
    {
        $services = Service::all();
        $studio = Studio::all()->first();

        return view('public.about', ['studio' => $studio, 'services' => $services]); //with datas
    }

    public function projects(Request $request)
    {
        $services = Service::all();
        $studio = Studio::all()->first();
        $works = Work::all();


        return view('public.project', ['studio' => $studio, 'works' => $works, 'services' => $services]);
    }

    public function services(Request $request)
    {
        $services = Service::all();
        $studio = Studio::all()->first();
        $services = Service::all();

        return view('public.services', ['studio' => $studio, 'services' => $services]);
    }

    public function rates(Request $request)
    {
        $services = Service::all();
        $studio = Studio::all()->first();
        $tarifs = Tarif::all();

        return view('public.rates', ['studio' => $studio, 'tarifs' => $tarifs, 'services' => $services]);
    }

    public function galery(Request $request)
    {
        $services = Service::all();
        $studio = Studio::all()->first();
        $images = Image::all();

        return view('public.galery', ['studio' => $studio, 'images' => $images, 'services' => $services]);
    }

    public function contact(Request $request)
    {
        $services = Service::all();
        $studio = Studio::all()->first();
        return view('public.contact', ['studio' => $studio, 'services' => $services]);
    }

    public function equipment(Request $request)
    {
        $services = Service::all();
        $studio = Studio::all()->first();
        $images = Image::all();
        return view('public.equipment',  ['studio' => $studio, 'images' => $images, 'services' => $services]);
    }

    public function reservation(Request $request)
    {
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $address = $request->addres;
        $date = explode('/', $request->date)[2] . "/" . explode('/', $request->date)[1] . "/" . explode('/', $request->date)[0];

        $service = $request->service;

        $reservation = new Reservation();
        $reservation->name = $name;
        $reservation->email = $email;
        $reservation->phone = $phone;
        $reservation->address = $address;
        $reservation->date_reservation = $date;
        $reservation->service_id = $service;
        $reservation->user_id = 1;
        $reservation->quatity = 1;

        if ($reservation->save()) {
            return redirect()->back()->with('success', 'Réservation enrégistrée avec succès !');
        }
    }
}
