<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Engineer;
use App\Models\group;
use App\Models\Image;
use App\Models\Pack;
use App\Models\ProjectImage;
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
        $pimages = ProjectImage::all();


        return view('public.project', ['studio' => $studio, 'works' => $works, 'services' => $services, 'pimages' => $pimages]);
    }

    public function services(Request $request)
    {
        $services = Service::all();
        $studio = Studio::all()->first();
        $services = Service::all();
        $services_ret = [];

        $i = 0;
        $master = null;
        foreach ($services as $service) {
            if ($i == 0 && $service->type == 1) {
                $master = $service;
            } else {
                if ($i == 1) {
                    $services_ret[] = $service;
                    $services_ret[] = $master;
                } else {
                    $services_ret[] = $service;
                }
            }
            $i++;
        }

        return view('public.services', ['studio' => $studio, 'services' => $services_ret]);
    }


    public function paiement(Request $request)
    {
        $services = Service::all();
        $studio = Studio::all()->first();
        $services = Service::all();
        $services_ret = [];

        return view('public.paiement', ['studio' => $studio, 'services' => $services]);
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
        $services = Service::all();
        $studio = Studio::all()->first();

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
        $group = null;
        $user = null;

        $date = $request->date;
        $created_at = null;

        // check client type
        if ($request->client_type == 1) {
            $group_name = $request->group_name;
            $group_owner = $request->group_user;
            $group_address = $request->group_address;
            $group_phone = $request->group_phone;
            $group_members = $request->group_members;

            if ($group_name === null || $group_owner === null || $group_members === null || $group_address === null || $group_phone === null) {
                return redirect('/reservation/' . $pack->id)->with('groupe', '')->withInput();
            } else {
                $groups = group::where('name', $group_name)->where('phone', $group_phone)->get();
                if (count($groups) == 0) {
                    $group = group::create([
                        'name' => $group_name,
                        'phone' => $group_phone,
                        'address' => $group_address,
                        'owner' => $group_owner,
                        'members' => $group_members,
                    ]);
                } else {
                    $group = $groups[0];
                }
            }
        } elseif ($request->client_type == 2) {
            $user_lastname = $request->user_lastname;
            $user_firstname = $request->user_firstname;
            $user_phone = $request->user_phone;
            $user_address = $request->user_address;
            $user_email = $request->user_email;

            if ($user_lastname === null || $user_email === null || $user_firstname === null || $user_phone === null || $user_address === null) {
                return redirect('/reservation/' . $pack->id)->with('user', '');
            } else {
                $users = User::where('email', $user_email)->get();

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
                    $user = User::where('email', $user_email)->first();
                }
            }
        }

        // check service type
        if ($service->type == 1) {
            // store mastering
            $seance_type = $request->seance_type;
            //$seance_qte = $request->seance_qte;
            $start_date = $request->start_date;
            $enr_type = $request->enr_type;
            $enr_type2 = $request->enr_type2;
            $songs_nb = $request->songs_nb;

            if ($seance_type === null || $start_date === null || $enr_type === null || $enr_type2 === null || $songs_nb === null) {
                return redirect('/reservation/' . $pack->id)->with('service', '')->withInput();
            } else {
                //store
                $data = [
                    'client_type' => $request->client_type,
                    'pack_id' => $pack->id,
                    'seance_type' => $seance_type,
                    //'seance_qte' => $seance_qte,
                    'start_date' => $start_date,
                    'enr_type' => $enr_type,
                    'enr_type2' => $enr_type2,
                    'songs_nb' => $songs_nb,
                    'status' => 1,
                    'total' => $seance_type === 1 ? $pack->price * $songs_nb : $pack->price * $songs_nb * 2
                ];

                $phone = null;

                if ($request->client_type == 1) {
                    $data['group_id'] = $group->id;
                    $phone = $group->phone;
                } elseif ($request->client_type == 2) {
                    $data['user_id'] = $user->id;
                    $phone = $user->phone;
                }
                if ($id = Reservation::create($data)) {
                    return view('public.paiement', ['studio' => $studio, 'reservation' => Reservation::find($id)[0], 'id' => $id, 'phone' => $phone, 'services' => $services, 'pack' => $pack->id, 'service' => $service]);
                    //return redirect()->route('public.invoice', ['reservation_id' => $id, 'pack_id' => $pack->id, 'service_id' => $service->id])->with('success', '');
                }
            }
        } elseif ($service->type == 2) {
            // impression
            $copies = $request->copies;
            $impression_proch = $request->impression_proch;

            if ($copies === null) {
                return redirect('/reservation/' . $pack->id)->with('service', '')->withInput();
            } else {
                $data = [
                    'client_type' => $request->client_type,
                    'service_id' => $service->id,
                    'copies' => $copies,
                    'impression_proch' => $impression_proch
                ];
                if ($request->client_type == 1) {
                    $data['group_id'] = $group->id;
                } elseif ($request->client_type == 2) {
                    $data['user_id'] = $user->id;
                }

                if ($id = Reservation::create($data)) {
                    return redirect()->route('public.invoice', ['reservation_id' => $id, 'pack_id' => $pack->id, 'service_id' => $service->id])->with('success', '');
                }
            }
        } elseif ($service->type == 3) {
            //duplication
            $duplication_nb = $request->duplication_nb;
            $duplication_type = $request->duplication_type;

            if ($duplication_nb === null || $duplication_type === null) {
                return redirect('/reservation/' . $pack->id)->with('service', '')->withInput();
            } else {
                $data = [
                    'client_type' => $request->client_type,
                    'service_id' => $service->id,
                    'duplication_nb' => $duplication_nb,
                    //'seance_qte' => $seance_qte,
                    'duplication_type' => $duplication_type
                ];
                if ($request->client_type == 1) {
                    $data['group_id'] = $group->id;
                } elseif ($request->client_type == 2) {
                    $data['user_id'] = $user->id;
                }
                if ($id = Reservation::create($data)) {
                    return redirect()->route('public.invoice', ['reservation_id' => $id, 'pack_id' => $pack->id, 'service_id' => $service->id])->with('success', '');
                }
            }
        }
        return redirect()->back();
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

    public function invoice(Request $request)
    {
        $services = Service::all();
        $studio = Studio::all()->first();

        $reservation = Reservation::find($request->reservation_id);
        $user = null;
        $group = null;

        if ($reservation->user_id !== null) {
            $user = User::find($reservation->user_id);
        }

        if ($reservation->group_id !== null) {
            $group = group::find($reservation->group_id);
        }

        $date = $reservation->type == 1 ? Carbon::parse($reservation->start_date)->format('D, d M Y à H:i') : Carbon::parse($reservation->created_at)->format('D, d M Y à H:i');

        return view('public.invoice', ['date' => $date, 'studio' => $studio, 'user' => $user, 'group' => $group, 'services' => $services, 'service' => Service::find($request->service_id), 'pack' => Pack::find($request->pack_id), 'reservation' => $reservation]);
    }
}
