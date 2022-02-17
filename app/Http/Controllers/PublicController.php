<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home(Request $request)
    {
        // get datas 
        return view('public.home'); //with datas
    }

    public function about(Request $request)
    {
        // get datas 
        return view('public.about'); //with datas
    }

    public function projects(Request $request)
    {
        return view('public.project');
    }

    public function services(Request $request)
    {
        return view('public.services');
    }

    public function rates(Request $request)
    {
        return view('public.rates');
    }

    public function galery(Request $request)
    {
        return view('public.galery');
    }

    public function contact(Request $request)
    {
        return view('public.contact');
    }

    public function equipment(Request $request)
    {
        return view('public.equipment');
    }
}
