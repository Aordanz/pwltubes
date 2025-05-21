<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProgramController extends Controller
{
    public function remaja()
    {
        return view('program.remaja');
    }

    public function dewasa()
    {
        return view('program.dewasa');
    }

    public function lansia()
    {
        return view('program.lansia');
    }
}
