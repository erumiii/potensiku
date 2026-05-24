<?php

namespace App\Http\Controllers;

// Import model User
use App\Models\User;
use App\Models\Participant;

// Import request Laravel
use Illuminate\Http\Request;

// Import Auth Laravel
use Illuminate\Support\Facades\Auth;

// Import Hash password
use Illuminate\Support\Facades\Hash;

// Import validasi password Laravel
use Illuminate\Validation\Rules\Password;

/**
 * Controller Authentication
 * Mengatur:
 * - Login
 * - Register
 * - Logout
 */
class AuthController extends Controller
{
    // =====================================================
    // LOGIN
    // =====================================================

    /**
     * Menampilkan halaman login
     */
    // ✅ Fix:
    public function showLogin()
    {
        if (Auth::check()) {
            return Auth::user()->role === 'admin'
                ? redirect()->route('dashboard')
                : redirect()->route('user.dashboard');
        }
        return view('auth.login');
    }

    /**
     * Proses login
     */
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Ambil data login
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        // Cek apakah login berhasil
        if (Auth::attempt($credentials)) {

            // Regenerate session biar lebih aman
            $request->session()->regenerate();

            // Kalau role admin
            if (Auth::user()->role === 'admin') {

                return redirect()
                    ->route('dashboard')
                    ->with('success', 'Login admin berhasil.');
            }

            // Kalau role user
            return redirect()
                ->route('user.dashboard')
                ->with('success', 'Login user berhasil.');
        }

        // Jika login gagal
        return back()
            ->withErrors([
                'username' => 'Username atau password salah.',
            ])
            ->withInput();
    }

    // =====================================================
    // REGISTER
    // =====================================================

    /**
     * Menampilkan halaman register
     */
    public function showRegister()
    {
        // Kalau sudah login
        // langsung ke dashboard
        if (Auth::check()) {
            return Auth::user()->role === 'admin'
                ? redirect()->route('dashboard')
                : redirect()->route('user.dashboard');
        }

        // Tampilkan halaman register
        return view('auth.register');
    }

    /**
     * Proses register
     */
    public function register(Request $request)
    {
        // Validasi input register
        $request->validate([
            'name' => ['required', 'string', 'max:255'],

            'username' => [
                'required',
                'string',
                'max:50',
                'unique:users,username',
            ],

            'email' => [
                'required',
                'email',
                'unique:users,email',
            ],

            'password' => [
                'required',
                'confirmed',
                Password::min(8),
            ],
        ]);

        // Membuat user baru
        $user = User::create([

            // Nama lengkap
            'name' => $request->name,

            // Username
            'username' => $request->username,

            // Email
            'email' => $request->email,

            // Password di-hash
            'password' => Hash::make($request->password),

            // Role default
            'role' => 'user',
        ]);

        // =====================================================
        // BUAT DATA PARTICIPANT OTOMATIS
        // =====================================================
        Participant::create([

            // Relasi ke user
            'user_id' => $user->id,

            // Status default
            'status' => 'active',

            // Optional auto code
            'participant_code' => 'PST-' . date('Y') . '-' . str_pad($user->id, 4, '0', STR_PAD_LEFT),
        ]);

        // Login otomatis setelah register
        Auth::login($user);

        // Regenerate session
        $request->session()->regenerate();

        // Setelah register user langsung ke halaman user
        return redirect()
            ->route('user.dashboard')
            ->with('success', 'Akun berhasil dibuat.');
    }

    // =====================================================
    // LOGOUT
    // =====================================================

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        // Logout akun
        Auth::logout();

        // Hapus session lama
        $request->session()->invalidate();

        // Generate token baru
        $request->session()->regenerateToken();

        // Redirect ke login
        return redirect()
            ->route('login')
            ->with('success', 'Berhasil logout.');
    }
}