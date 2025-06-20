<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\DoctorChatController;

// Halaman utama dan statis
Route::get('/', fn() => view('home'))->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::view('/contact', 'contact')->name('contact');

// Login dan Register
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route hanya untuk user yang sudah login
Route::middleware('auth')->group(function () {

    // Halaman program utama sesuai kategori
    Route::get('/program/remaja', [ProgramController::class, 'remaja'])->name('program.remaja');
    Route::get('/program/dewasa', [ProgramController::class, 'dewasa'])->name('program.dewasa');
    Route::get('/program/lansia', [ProgramController::class, 'lansia'])->name('program.lansia');

    // Detail aktivitas (show)
    Route::get('/activity/remaja/{id}', [ProgramController::class, 'showRemajaActivity'])->name('activity.remaja.show');
    Route::get('/activity/dewasa/{id}', [ProgramController::class, 'showDewasaActivity'])->name('activity.dewasa.show');
    Route::get('/activity/lansia/{id}', [ProgramController::class, 'showLansiaActivity'])->name('activity.lansia.show');

    // Tandai aktivitas latihan terpenuhi
    Route::post('/program/{kategori}/terpenuhi', function (Request $request, $kategori) {
        $hari = $request->input('hari');
        $status = session("latihan_terpenuhi.$kategori", []);
        $status[$hari] = true;
        session(["latihan_terpenuhi.$kategori" => $status]);

        return redirect()->route('program.' . $kategori);
    })->name('program.terpenuhi');

    // Redirect ke halaman program berdasarkan kategori umur
    Route::get('/home', function () {
        $user = auth::user();

        if ($user->role === 'doctor') {
            return redirect()->route('doctor.dashboard');
        }

        return match ($user->age_category) {
            'remaja' => redirect()->route('program.remaja'),
            'dewasa' => redirect()->route('program.dewasa'),
            'lansia' => redirect()->route('program.lansia'),
            default => abort(403, 'Kategori umur tidak valid'),
        };
    })->name('home');

    // Chat untuk user
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
    Route::post('/chat/fetch', [ChatController::class, 'fetch'])->name('chat.fetch');

    // Dashboard dokter
    Route::get('/doctor/dashboard', function () {
        if (auth::user()->role !== 'doctor') abort(403);
        return view('doctor.dashboard');
    })->name('doctor.dashboard');

    // Chat untuk dokter
    Route::get('/doctor/chat', [DoctorChatController::class, 'index'])->name('doctor.chat');
    Route::post('/doctor/chat', [DoctorChatController::class, 'send'])->name('doctor.chat.send');
});