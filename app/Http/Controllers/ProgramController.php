<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AktivitasRemaja;
use App\Models\AktivitasDewasa;
use App\Models\AktivitasLansia;

class ProgramController extends Controller
{
    public function remaja()
    {
        $aktivitasList = AktivitasRemaja::orderBy('hari')->get();
        return view('program.remaja', compact('aktivitasList'));
    }

    public function showRemajaActivity($id)
    {
        $aktivitas = AktivitasRemaja::findOrFail($id);
        return view('program.remaja.show', compact('aktivitas'));
    }

    public function dewasa()
    {
        $aktivitasList = AktivitasDewasa::orderBy('hari')->get();
        return view('program.dewasa', compact('aktivitasList'));
    }

    public function showDewasaActivity($id)
    {
        $aktivitas = AktivitasDewasa::findOrFail($id);
        return view('program.dewasa.show', compact('aktivitas'));
    }

    public function lansia()
    {
        $aktivitasList = AktivitasLansia::orderBy('hari')->get();
        return view('program.lansia', compact('aktivitasList'));
    }

    public function showLansiaActivity($id)
    {
        $aktivitas = AktivitasLansia::findOrFail($id);
        return view('program.lansia.show', compact('aktivitas'));
    }
}
