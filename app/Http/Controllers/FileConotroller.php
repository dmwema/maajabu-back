<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\FTitle;
use Illuminate\Http\Request;

class FileConotroller extends Controller
{
    public function index(Request $request)
    {
        $files = File::all();

        return view('users.ir.files', compact('files'));
    }

    public function new(Request $request)
    {
        $titles = FTitle::all();
        return view('users.ir.new_file', compact('titles'));
    }
}
