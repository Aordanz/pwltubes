<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\RemajaActivityController;
use App\Http\Controllers\DewasaActivityController;
use App\Http\Controllers\LansiaActivityController;
use App\Http\Controllers\DoctorChatController;
use App\Http\Controllers\ProfileController;

// ===== PERUBAHAN DI SINI: IMPORT KELAS MIDDLEWARE SECARA LANGSUNG =====
use App\Http\Middleware\CheckIfDoctor;

/*
|--------------------------------------------------------------------------
| Rute Publik
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
})->name('home');

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
    // ... rute profile, program, activity, dan chat user ...
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/change-password', [ProfileController::class, 'changePassword'])->name('profile.changePassword');
    Route::get('/program/remaja', [ProgramController::class, 'remaja'])->name('program.remaja');
    Route::get('/program/dewasa', [ProgramController::class, 'dewasa'])->name('program.dewasa');
    Route::get('/program/lansia', [ProgramController::class, 'lansia'])->name('program.lansia');
    Route::get('/activity/remaja/{id}', [RemajaActivityController::class, 'show'])->name('activity.remaja.show');
    Route::get('/activity/dewasa/{id}', [DewasaActivityController::class, 'show'])->name('activity.dewasa.show');
    Route::get('/activity/lansia/{id}', [LansiaActivityController::class, 'show'])->name('activity.lansia.show');
    Route::post('/program/terpenuhi', [ProgramController::class, 'tandaiTerpenuhi'])->name('program.terpenuhi');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/chat/fetch/{mentorId}', [ChatController::class, 'fetchMessages'])->name('chat.fetch');




    // proyek gagal
    // Route::put('/chat/messages/{message}', [ChatController::class, 'update'])->name('chat.update');
    //     Route::delete('/chat/messages/{message}', [ChatController::class, 'destroy'])->name('chat.destroy');
    
});

/*
|--------------------------------------------------------------------------
| Rute KHUSUS untuk Dokter
|--------------------------------------------------------------------------
*/
// ===== PERUBAHAN DI SINI: MEMANGGIL KELAS MIDDLEWARE LANGSUNG, BUKAN ALIAS 'is_doctor' =====
Route::middleware(['auth', CheckIfDoctor::class])
    ->prefix('doctor')
    ->name('doctor.')
    ->group(function () {
        Route::get('/dashboard', fn() => view('doctor.dashboard'))->name('dashboard');
        Route::get('/chat', [DoctorChatController::class, 'index'])->name('chat');
        Route::get('/chat/fetch/{userId}', [DoctorChatController::class, 'fetchMessagesForDoctor'])->name('chat.fetch');
        Route::post('/chat/send', [DoctorChatController::class, 'sendMessage'])->name('chat.send'); 
        
         
});