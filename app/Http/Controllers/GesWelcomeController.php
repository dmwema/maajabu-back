<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Reservation;
use Carbon\Carbon;
use Dnsimmons\OpenWeather\OpenWeather;
use Illuminate\Http\Request;

class GesWelcomeController extends Controller
{

    private function temps()
    {
        // temps
        $w = new OpenWeather();
        $current = $w->getForecastWeatherByCityName('Kinshasa', 'kelvin');

        return $current;
    }

    public function admin(Request $request)
    {
        // last reservations
        $reservations = Reservation::orderBy('created_at', 'desc')->take(5)->get();

        // last messages
        $messages = Contact::orderBy('created_at', 'desc')->take(5)->get();

        // user infos
        $admin = $request->session()->get('admin');

        return view('users.admin.home', ['admin' => $admin, 'reservations' => $reservations, 'messages' => $messages, 'temps' => $this->temps(), 'current_day' => Carbon::now()->dayOfWeek]);
    }

    public function ir(Request $request)
    {
        $this->temps();

        $messages = [];

        // user infos
        $ir = $request->session()->get('ir');

        return view('users.ir.home', ['ir' => $ir, 'messages' => $messages, 'temps' => $this->temps(), 'current_day' => Carbon::now()->dayOfWeek]);
    }

    public function finance(Request $request)
    {
        $this->temps();

        $messages = [];

        // user infos
        $finance = $request->session()->get('finance');

        return view('users.finance.home', ['finance' => $finance, 'messages' => $messages, 'temps' => $this->temps(), 'current_day' => Carbon::now()->dayOfWeek]);
    }
}
