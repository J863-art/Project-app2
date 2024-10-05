<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileadminController extends Controller
{
    public function edit()
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $user = Auth::user();
        return view('dashmin.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
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

        return redirect()->route('dashmin.profile.edit')->with('success', 'Profile updated successfully.');
    }
}

