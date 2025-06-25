namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
<<<<<<< HEAD
        $credentials = $request->only('email', 'password');
=======
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
>>>>>>> 36e76976e6fb972c24be721100372691b78a9975

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

<<<<<<< HEAD
            return redirect()->intended(
                auth()->user()->is_admin ? '/adminpanel' : '/home'
            );
=======
            $user = Auth::user();

            // =================================================================
            // PERBAIKAN: Menambahkan logika redirect berdasarkan peran
            // =================================================================

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
                    // Fallback jika kategori umur tidak valid
                    return redirect('/');
            }
>>>>>>> 36e76976e6fb972c24be721100372691b78a9975
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
<<<<<<< HEAD

        return redirect('/');
=======
        return redirect('/login');
>>>>>>> 36e76976e6fb972c24be721100372691b78a9975
    }
}
