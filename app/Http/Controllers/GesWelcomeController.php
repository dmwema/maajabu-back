<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Reservation;
use Carbon\Carbon;
use Dnsimmons\OpenWeather\OpenWeather;
use Illuminate\Http\Request;

class GesWelcomeController extends Controller
{
    public function index(Request $request)
    {
        // last reservations
        $reservations = Reservation::orderBy('created_at', 'desc')->take(5)->get();

        // last messages
        $messages = Contact::orderBy('created_at', 'desc')->take(5)->get();

        // temps
        $w = new OpenWeather();
        $current = $w->getForecastWeatherByCityName('Kinshasa', 'kelvin');

        // user infos
        $admin = $request->session()->get('admin');

        return view('admin.home', ['admin' => $admin, 'reservations' => $reservations, 'messages' => $messages, 'temps' => $current, 'current_day' => Carbon::now()->dayOfWeek]);
    }
}
