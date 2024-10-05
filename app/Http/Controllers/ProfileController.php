<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }
        $user = Auth::user();
        return view('dashboard.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }
        $user = Auth::user();

        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
            'no_telp' => 'required|string|max:15',
        ]);

        $user->username = $request->username;
        $user->no_telp = $request->no_telp;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('dashboard.profile.edit')->with('success', 'Profile updated successfully.');
    }
}

