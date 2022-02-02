<?php

namespace App\Http\Controllers;

use App\Models\Engineer;
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

        $route_prefix = '';


        if ($type == ADMIN_ID) {
            $user = User::where('email', $email)->where('identity', $type)->first();
            //dd($user);
            if ($user) {
                if (Hash::check($pass, $user->password)) {
                    $route_prefix = 'admin';
                    $request->session()->put('admin', $user);
                    return redirect()->route($route_prefix . '.home');
                }
            }
        } else if ($type == IR_ID) {
            $user = Engineer::where('email', $email)->first();
            if ($user) {
                if (Hash::check($pass, $user->password)) {
                    $route_prefix = 'ir';
                    $request->session()->put('ir', $user);
                    return redirect()->route($route_prefix . '.home');
                }
            }
        } else if ($type == FINANCE_ID) {
            $user = User::where('email', $email)->where('identity', $type)->first();
            if ($user) {
                if (Hash::check($pass, $user->password)) {
                    $route_prefix = 'finance';
                    $request->session()->put('finance', $user);
                    return redirect()->route($route_prefix . '.home');
                }
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
