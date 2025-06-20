<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RemajaActivityController;
use App\Http\Controllers\DewasaActivityController;
use App\Http\Controllers\LansiaActivityController;
use App\Http\Controllers\DoctorChatController;

// Halaman utama dan halaman statis
Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::view('/contact', 'contact')->name('contact');

// Login dan Register
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Semua route berikut hanya dapat diakses oleh user yang sudah login
Route::middleware('auth')->group(function () {

    // Halaman aktivitas berdasarkan kategori umur
    Route::get('/activity/remaja/{id}', [RemajaActivityController::class, 'show'])->name('activity.remaja.show');
    Route::get('/activity/dewasa/{id}', [DewasaActivityController::class, 'show'])->name('activity.dewasa.show');
    Route::get('/activity/lansia/{id}', [LansiaActivityController::class, 'show'])->name('activity.lansia.show');

    // Chat user biasa
    Route::post('/chat/send', [ChatController::class, 'send'])->name('chat.send');
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
Route::get('/chat/fetch', [ChatController::class, 'fetch'])->name('chat.fetch');


    // Redirect user ke halaman program latihan sesuai kategori umur
    Route::get('/home', function () {
        $user = auth::user();

        if ($user->role === 'doctor') {
            return redirect()->route('doctor.dashboard');
        }

        switch ($user->age_category) {
            case 'remaja':
                return redirect()->route('program.remaja');
            case 'dewasa':
                return redirect()->route('program.dewasa');
            case 'lansia':
                return redirect()->route('program.lansia');
            default:
                abort(403, 'Kategori umur tidak valid');
        }
    })->name('home');

    // Halaman program latihan
    Route::get('/program/remaja', [ProgramController::class, 'remaja'])->name('program.remaja');
    Route::get('/program/dewasa', [ProgramController::class, 'dewasa'])->name('program.dewasa');
    Route::get('/program/lansia', [ProgramController::class, 'lansia'])->name('program.lansia');
    Route::get('/activity/{id}', [ProgramController::class, 'detail']);

    // Dashboard Dokter & Chat
    Route::get('/doctor/dashboard', function () {
        if (auth::user()->role !== 'doctor') {
            abort(403);
        }
        return view('doctor.dashboard');
    })->name('doctor.dashboard');

    Route::get('/doctor/chat', [DoctorChatController::class, 'index'])->name('doctor.chat');
    Route::post('/doctor/chat', [DoctorChatController::class, 'send'])->name('doctor.chat.send');
    
});


// ✅ Versi benar, TANPA {kategori} di URL
Route::post('/program/terpenuhi', [ProgramController::class, 'tandaiTerpenuhi'])->name('program.terpenuhi');

