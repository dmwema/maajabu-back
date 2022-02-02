<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\User;
use Illuminate\Http\Request;

class PaiementController extends Controller
{
    public function index(Request $request)
    {
        $paiements = Paiement::all();

        return view('users.finance.paiement', ['paiements' => $paiements]);
    }

    public function new(Request $request)
    {
        $users = User::where('identity', '!=', '1')->where('identity', '!=', '2')->where('identity', '!=', '3')->get();
        return view('users.finance.new_paiement', ['users' => $users]);
    }

    public function store(Request $request)
    {
        if (Paiement::create($request->all())) {
            return redirect()->back()->with('success', 'Paiement enrégistrée avec succès');
        }
        return redirect()->back()->with('fail', 'Veuillez réessayer, une erreur est survenue');
    }

    public function destroy(Request $request)
    {
        $paiement = Paiement::find($request->id);
        if ($paiement->delete()) {
            return redirect()->back()->with('success', 'Paiement supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Veuillez réessayer, une erreur est survenue');
    }
}
