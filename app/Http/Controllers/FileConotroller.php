<?php

namespace App\Http\Controllers;

use App\Models\Engineer;
use App\Models\FElement;
use App\Models\File;
use App\Models\FTitle;
use App\Models\Work;
use Illuminate\Http\Request;

class FileConotroller extends Controller
{
    public function index(Request $request)
    {
        $files = File::all();

        $irs = Engineer::all();

        $works = Work::all();

        return view('users.ir.files', compact('files', 'irs', 'works'));
    }

    public function store(Request $request)
    {
        $file = new File();

        $ir = $request->session()->get('ir');

        $file->engineer_id = $ir->id;
        $file->work_id = $request->work_id;

        if ($file->save()) {
            return redirect()->route('show_file', ['id' => $file->id])->with('success', 'fiche enrégistré avec succès');
        }
    }

    public function store_element(Request $request)
    {
        $elemment = new FElement();

        $works = Work::all();

        $ir = $request->session()->get('ir');

        $works = Work::all();

        if (FElement::create($request->all())) {
            $titles = FTitle::all();
            return redirect()->back()->with('success', 'Élément enrégistré avec succès');
        }
    }

    public function show_file(Request $request, $id)
    {
        $works = Work::all();

        $file = File::findOrFail($id);

        $titles = FTitle::all();
        return view('users.ir.new_file', compact('titles', 'file', 'works'));
    }

    public function delete_element(Request $request)
    {
        $element = FElement::find($request->id);
        if ($element->delete()) {
            return redirect()->back()->with('success', 'Élément supprimé avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
    }

    public function delete(Request $request)
    {
        $file = File::find($request->id);
        if ($file->delete()) {
            return redirect()->route('ir.files')->with('success', 'Fiche supprimée avec succès');
        }
        return redirect()->back()->with('fail', 'Une erreur est survénue');
    }
}
