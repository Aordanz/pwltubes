<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // <-- Import fasad Auth
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RemajaActivityController;
use App\Http\Controllers\DewasaActivityController;
use App\Http\Controllers\LansiaActivityController;
use App\Http\Controllers\DoctorChatController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\CheckIfDoctor;

/*
|--------------------------------------------------------------------------
| Rute Publik
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home.public'); // Diubah agar tidak konflik

Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rute untuk Pengguna yang Sudah Login
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    
    // =====================================================================
    // RUTE BARU: Pintu Gerbang Utama Setelah Login
    // =====================================================================
    Route::get('/home', function() {
        $user = Auth::user();

        // 1. Cek apakah pengguna adalah admin
        if ($user->role === 'admin') {
            return redirect('/admin'); // Arahkan ke dashboard Filament
        }

        // 2. Cek apakah pengguna adalah dokter
        if ($user->role === 'doctor') {
            return redirect()->route('doctor.dashboard');
        }

        // 3. Jika bukan keduanya, arahkan ke program sesuai kategori umur
        switch ($user->age_category) {
            case 'remaja':
                return redirect()->route('program.remaja');
            case 'dewasa':
                return redirect()->route('program.dewasa');
            case 'lansia':
                return redirect()->route('program.lansia');
            default:
                // Fallback jika tidak ada kategori
                return redirect('/');
        }
    })->name('home');
    // =====================================================================

    // ... sisa rute Anda (profile, program, activity, dll.)
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::get('/program/remaja', [ProgramController::class, 'remaja'])->name('program.remaja');
    Route::get('/program/dewasa', [ProgramController::class, 'dewasa'])->name('program.dewasa');
    Route::get('/program/lansia', [ProgramController::class, 'lansia'])->name('program.lansia');
    Route::get('/activity/remaja/hari/{hari}', [RemajaActivityController::class, 'show'])->name('activity.remaja.show');
    Route::get('/activity/dewasa/hari/{hari}', [DewasaActivityController::class, 'show'])->name('activity.dewasa.show');
    Route::get('/activity/lansia/hari/{hari}', [LansiaActivityController::class, 'show'])->name('activity.lansia.show');
    Route::post('/activity/complete', [ProgramController::class, 'markAsCompleteFromDetail'])->name('activity.complete');
    Route::post('/program/terpenuhi', [ProgramController::class, 'tandaiTerpenuhi'])->name('program.terpenuhi');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/fetch/{mentorId}', [ChatController::class, 'fetchMessages'])->name('chat.fetch');
    
});

/*
|--------------------------------------------------------------------------
| Rute KHUSUS untuk Dokter
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', CheckIfDoctor::class])
    ->prefix('doctor')
    ->name('doctor.')
    ->group(function () {
        Route::get('/dashboard', fn() => view('doctor.dashboard'))->name('dashboard');
        Route::get('/chat', [DoctorChatController::class, 'index'])->name('chat');
        Route::get('/chat/fetch/{userId}', [DoctorChatController::class, 'fetchMessagesForDoctor'])->name('chat.fetch');
        Route::post('/chat/send', [DoctorChatController::class, 'sendMessage'])->name('chat.send'); 
});
