<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogadminController extends Controller
{
    public function index()
    {
        return view('logadmin.index', [
            'title' => 'Logadmin'
        ]);
    }

    public function authenticate(Request $request)
    {
        // Validasi input username dan password
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Proses autentikasi
        if (Auth::attempt($credentials)) {
            // Ambil pengguna yang sedang login
            $user = Auth::user();

            // Periksa apakah role pengguna adalah 'admin'
            if ($user->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->intended('/dashmin');
            } else {
                // Logout jika bukan role 'admin'
                Auth::logout();
                return back()->with('loginError', 'Login Gagal. Anda bukan admin.');
            }
        }

        // Jika login gagal, kembali dengan pesan error
        return back()->with('loginError', 'Login failed! Periksa username atau password.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/dashmin');
    }
}
