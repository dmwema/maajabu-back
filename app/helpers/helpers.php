<?php

use Illuminate\Http\Request;

const PROJECT_URL = 'https://localhost:8000/';

const ADMIN_ID = 1;
const IR_ID = 2;
const FINANCE_ID = 3;


if (!function_exists('is_connected')) {


    function is_connected(Request $request)
    {
        return $request->session()->has('admin') || $request->session()->has('ir') || $request->session()->has('finance');
    }
}
