<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function index()
{
    $user = Auth::user();
    return view('profile.index', compact('user'));
}
    public function update(Request $request)
{
    $user = Auth::user();

    // Validasi input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'password' => 'nullable|string|min:6|confirmed',
    ]);

    // Update data dasar
    $user->name = $request->name;
    $user->email = $request->email;

    // Kalau ada file foto di-upload
    if ($request->hasFile('photo')) {
        $image = $request->file('photo');
        $type = $image->getMimeType();
        $imageData = 'data:' . $type . ';base64,' . base64_encode(file_get_contents($image->path()));
        $user->photo = $imageData;
    }

    // Kalau password diisi, update password
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    // Simpan data user
    $user->save();

    // Refresh session user
    Auth::setUser($user);

    return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
}

}