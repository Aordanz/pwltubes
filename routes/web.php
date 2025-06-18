<?php
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ActivityController;  // Pastikan kamu sudah buat ChatController

// Halaman utama dan halaman statis (bisa diganti dengan controller jika perlu)
Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/about', 'about')->name('about');
Route::view('/services', 'services')->name('services');
Route::view('/contact', 'contact')->name('contact');

// Login dan Register (tanpa menggunakan Laravel Breeze / Auth::routes())
Route::get('/login', [LoginController::class, 'showForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');

Route::get('/register', [RegisterController::class, 'showForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Semua route berikut hanya dapat diakses oleh user yang sudah login
Route::middleware('auth')->group(function () {
    Route::post('/chat/send', [ChatController::class, 'send']);
Route::get('/chat/get', [ChatController::class, 'get']);

    // Redirect user ke halaman program latihan sesuai kategori umur setelah login
    Route::get('/home', function () {
        $user = auth()->user();

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

    // Halaman program latihan sesuai kategori umur
    Route::get('/program/remaja', [ProgramController::class, 'remaja'])->name('program.remaja');
    Route::get('/program/dewasa', [ProgramController::class, 'dewasa'])->name('program.dewasa');
    Route::get('/program/lansia', [ProgramController::class, 'lansia'])->name('program.lansia');
    Route::get('/activity/{id}', [ProgramController::class, 'detail']);


    // Fitur chat antara admin dan user (belum implementasi detail)
    Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');
    Route::post('/chat/send', [ChatController::class, 'sendMessage'])->name('chat.send');
    Route::get('/activity/{id}', [ActivityController::class, 'show'])->name('activity.show');
    Route::get('/activity/{id}', [ActivityController::class, 'show'])->name('activity.show');
});

Route::post('/program/{kategori}/terpenuhi', function (Request $request, $kategori) {
    $hari = $request->input('hari');
    $status = session("latihan_terpenuhi.$kategori", []);
    $status[$hari] = true;
    session(["latihan_terpenuhi.$kategori" => $status]);

    return redirect()->route('program.' . $kategori);
})->name('program.terpenuhi');
