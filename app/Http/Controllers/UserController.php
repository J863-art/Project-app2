<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nik' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'no_telp' => 'required|string|max:15',
            'password' => 'required|string|min:6', // Password harus minimal 6 karakter
            'role' => 'required|in:admin,user',
        ], [
            'password.min' => 'Password harus memiliki minimal 6 karakter.', // Pesan khusus
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']); // Enkripsi password

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nik' => 'required|string|max:255|unique:users,nik,' . $id,
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . $id,
            'no_telp' => 'required|string|max:15',
            'role' => 'required|in:admin,user',
        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', 'User berhasil diupdate!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus!');
    }
}
