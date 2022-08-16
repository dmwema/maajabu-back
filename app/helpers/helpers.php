<?php

use App\Models\Studio;
use Illuminate\Http\Request;

const PROJECT_URL = 'https://localhost:8000/';

const ADMIN_ID = 1;
const IR_ID = 2;
const FINANCE_ID = 3;
const CLIENTS_ID = 4;

const ONLINE_PAIEMENT = 11;
const PHYSICAL_PAIEMENT = 12;

const CLIENT__GROUP = 1;
const CLIENT__USER = 2;


if (!function_exists('is_connected')) {

    function is_connected(Request $request)
    {
        return $request->session()->has('admin') || $request->session()->has('ir') || $request->session()->has('finance');
    }
}

if (!function_exists('studio')) {


    function studio()
    {
        return Studio::all()->first();
    }
}
