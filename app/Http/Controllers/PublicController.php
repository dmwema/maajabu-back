<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Engineer;
use App\Models\group;
use App\Models\Image;
use App\Models\Pack;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\Studio;
use App\Models\Tarif;
use App\Models\User;
use App\Models\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function packs(Request $request)
    {
        $service = Service::find($request->service_id);
        $packs = Pack::where('service_id', $service->id)->orderBy('created_at')->get();
        $studio = Studio::all()->first();
        $services = Service::all();
        return view('public.packs', ['studio' => $studio, 'packs' => $packs, 'service' => $service, 'services' => $services]);
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
        $group_name = null;
        $group_owner = null;
        $group_address = null;
        $group_phone = null;
        $group_members = null;

        $user_lastname = null;
        $user_firstname = null;
        $user_phone = null;
        $user_address = null;
        $user_email = null;

        $pack = Pack::find($request->pack_id);
        $service = Service::find($pack->service_id);

        if ($request->client_type == 1) {
            $group_name = $request->group_name;
            $group_owner = $request->group_user;
            $group_address = $request->group_address;
            $group_phone = $request->group_phone;
            $group_members = $request->group_members;

            if ($group_name === null || $group_owner === null || $group_members === null || $group_address === null || $group_phone === null) {
                return redirect()->back()->with('groupe', '');
            } else {
                $groups = group::where('name', $group_name)->where('phone', $group_phone)->get();
                $group = null;

                if (count($groups) == 0) {
                    $group = group::create([
                        'name' => $group_name,
                        'phone' => $group_phone,
                        'address' => $group_address,
                        'owner' => $group_owner,
                        'members' => $group_members,
                    ]);
                } else {
                    $group = group::where('name', $group_name)->where('phone', $group_name)->first();
                }
                return $group;
            }
        } elseif ($request->client_type == 2) {
            $user_lastname = $request->user_lastname;
            $user_firstname = $request->user_firstname;
            $user_phone = $request->user_phone;
            $user_address = $request->user_address;
            $user_email = $request->user_email;

            if ($user_lastname === null || $user_email === null || $user_firstname === null || $user_phone === null || $user_address === null) {
                return redirect()->back()->with('user', '');
            } else {
                $users = User::where('email', $user_email)->get();
                $user = null;

                if (count($users) == 0) {
                    $user = User::create([
                        'name' => $user_lastname,
                        'firstname' => $user_firstname,
                        'email' => $user_email,
                        'phone' => $user_phone,
                        'password' => Hash::make('DpasswordM22'),
                        'address' => $user_address
                    ]);
                } else {
                    $user = User::where('email', $user_email)->get();
                }

                dd($user);
            }
        }

        dd($request->all());
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

    public function reservation_new(Request $request)
    {
        $pack = Pack::find($request->pack_id);
        $service = Service::find($pack->service_id);
        $services = Service::all();
        $studio = Studio::all()->first();
        $groups = group::all();

        return view('public.reservation',  ['groups' => $groups, 'studio' => $studio, 'pack' => $pack, 'service' => $service, 'services' => $services]);
    }
}
