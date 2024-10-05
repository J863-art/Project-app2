<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan ini untuk mengimpor kelas Auth


class LoginTagihanController extends Controller
{
    public function index()
    {
        return view('logintagihan.index', [
            'title' => 'Login'
        ]);
    }

    public function authenticate(Request $request)
{
    // Memvalidasi input 'nik' dan 'password'
    $credentials = $request->validate([
        'nik' => 'required',
        'password' => 'required'
    ]);

    // Proses autentikasi
    if (Auth::attempt($credentials)) {
        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Periksa apakah role pengguna adalah 'user'
        if ($user->role === 'user') {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
            return redirect()->intended('/tagihan');
        } else {
            // Logout jika bukan role 'user'
            Auth::logout();
            return back()->with('loginError', 'Login Gagal.');
        }
    }

    // Jika login gagal, kembali dengan pesan error
    return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/dashboard');
    }

}
