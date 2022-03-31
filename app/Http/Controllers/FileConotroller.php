<?php

namespace App\Http\Controllers;

use App\Models\Engineer;
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
            $titles = FTitle::all();
            return view('users.ir.new_file', compact('titles', 'file'));
        }
    }
}
