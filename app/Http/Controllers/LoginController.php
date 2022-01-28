<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {

        $type = $request->identity;
        $email = $request->email;
        $pass = $request->password;



        $user = User::where('email', $email)->where('identity', $type)->first();
        $route_prefix = '';

        if ($user) {
            if (Hash::check($pass, $user->password)) {
                if ($type == ADMIN_ID) {
                    $request->session()->put('admin', $user);
                    $route_prefix = 'admin';
                } else if ($type == IR_ID) {
                    $request->session()->put('ir', $user);
                    $route_prefix = 'ir';
                } else if ($type == FINANCE_ID) {
                    $request->session()->put('finance', $user);
                    $route_prefix = 'finance';
                }

                return redirect()->route($route_prefix . '.home');
            }
        }

        return redirect()->back()->with('danger', "Email ou mot de passe incorrecte");
    }

    public function admin_logout(Request $request)
    {
        $request->session()->forget('admin');

        return redirect()->route('login')->with('success', 'Vous vous êtes déconnecté avec succès');
    }

    public function ir_logout(Request $request)
    {
        $request->session()->forget('ir');

        return redirect()->route('login')->with('success', 'Vous vous êtes déconnecté avec succès');
    }

    public function finance_logout(Request $request)
    {
        $request->session()->forget('finance');

        return redirect()->route('login')->with('success', 'Vous vous êtes déconnecté avec succès');
    }

    public function connexion(Request $request)
    {
        if (is_connected($request)) {

            if ($request->session()->has('admin')) {
                return redirect()->route('admin.home');
            } else if ($request->session()->has('ir')) {
                return redirect()->route('ir.home');
            } else if ($request->session()->has('finance')) {
                return redirect()->route('finance.home');
            }
        }

        return view('login');
    }
}
