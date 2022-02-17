<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use App\Models\Engineer;
use App\Models\Image;
use App\Models\Service;
use App\Models\Studio;
use App\Models\Tarif;
use App\Models\Work;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(Request $request)
    {
        $studio = Studio::all()->first();
        $works = Work::all();
        $artists = Artist::all();
        $engineers = Engineer::all();

        return view('public.home', ['studio' => $studio, 'works' => $works, 'artists' => $artists, 'engineers' => $engineers]); //with datas
    }

    public function about(Request $request)
    {
        $studio = Studio::all()->first();

        return view('public.about', ['studio' => $studio]); //with datas
    }

    public function projects(Request $request)
    {
        $studio = Studio::all()->first();
        $works = Work::all();


        return view('public.project', ['studio' => $studio, 'works' => $works]);
    }

    public function services(Request $request)
    {
        $studio = Studio::all()->first();
        $services = Service::all();

        return view('public.services', ['studio' => $studio, 'services' => $services]);
    }

    public function rates(Request $request)
    {
        $studio = Studio::all()->first();
        $tarifs = Tarif::all();

        return view('public.rates', ['studio' => $studio, 'tarifs' => $tarifs]);
    }

    public function galery(Request $request)
    {
        $studio = Studio::all()->first();
        $images = Image::all();

        return view('public.galery', ['studio' => $studio, 'images' => $images]);
    }

    public function contact(Request $request)
    {
        $studio = Studio::all()->first();
        return view('public.contact', ['studio' => $studio]);
    }

    public function equipment(Request $request)
    {
        return view('public.equipment');
    }
}
