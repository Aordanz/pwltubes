<?php

use App\Models\AktivitasUser;
use Illuminate\Support\Facades\Auth;

public function store(Request $request)
{
    AktivitasUser::create([
        'user_id' => Auth::id(),
        'kategori' => $request->kategori,
        'aktivitas_id' => $request->aktivitas_id,
        'aktivitas_nama' => $request->aktivitas_nama,
        'selesai_pada' => now(),
    ]);

    return back()->with('success', 'Anda telah menyelesaikan aktivitas ini. Sampai bertemu di esok hari!');
}
